<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Profile;

use App\Models\Captain;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_profiles(): void
    {
        $profiles = Profile::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('profiles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.profiles.index')
            ->assertViewHas('profiles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_profile(): void
    {
        $response = $this->get(route('profiles.create'));

        $response->assertOk()->assertViewIs('app.profiles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_profile(): void
    {
        $data = Profile::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('profiles.store'), $data);

        $this->assertDatabaseHas('profiles', $data);

        $profile = Profile::latest('id')->first();

        $response->assertRedirect(route('profiles.edit', $profile));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_profile(): void
    {
        $profile = Profile::factory()->create();

        $response = $this->get(route('profiles.show', $profile));

        $response
            ->assertOk()
            ->assertViewIs('app.profiles.show')
            ->assertViewHas('profile');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_profile(): void
    {
        $profile = Profile::factory()->create();

        $response = $this->get(route('profiles.edit', $profile));

        $response
            ->assertOk()
            ->assertViewIs('app.profiles.edit')
            ->assertViewHas('profile');
    }

    /**
     * @test
     */
    public function it_updates_the_profile(): void
    {
        $profile = Profile::factory()->create();

        $user = User::factory()->create();
        $captain = Captain::factory()->create();

        $data = [
            'full_name' => $this->faker->text(255),
            'email' => $this->faker->email(),
            'street' => $this->faker->streetName(),
            'city' => $this->faker->city(),
            'district' => $this->faker->text(255),
            'user_id' => $user->id,
            'captain_id' => $captain->id,
        ];

        $response = $this->put(route('profiles.update', $profile), $data);

        $data['id'] = $profile->id;

        $this->assertDatabaseHas('profiles', $data);

        $response->assertRedirect(route('profiles.edit', $profile));
    }

    /**
     * @test
     */
    public function it_deletes_the_profile(): void
    {
        $profile = Profile::factory()->create();

        $response = $this->delete(route('profiles.destroy', $profile));

        $response->assertRedirect(route('profiles.index'));

        $this->assertModelMissing($profile);
    }
}
