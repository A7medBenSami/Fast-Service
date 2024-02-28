<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Profile;

use App\Models\Captain;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_profiles_list(): void
    {
        $profiles = Profile::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.profiles.index'));

        $response->assertOk()->assertSee($profiles[0]->full_name);
    }

    /**
     * @test
     */
    public function it_stores_the_profile(): void
    {
        $data = Profile::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.profiles.store'), $data);

        $this->assertDatabaseHas('profiles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.profiles.update', $profile),
            $data
        );

        $data['id'] = $profile->id;

        $this->assertDatabaseHas('profiles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_profile(): void
    {
        $profile = Profile::factory()->create();

        $response = $this->deleteJson(route('api.profiles.destroy', $profile));

        $this->assertModelMissing($profile);

        $response->assertNoContent();
    }
}
