<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Captain;

use App\Models\Vehicle;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaptainControllerTest extends TestCase
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
    public function it_displays_index_view_with_captains(): void
    {
        $captains = Captain::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('captains.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.captains.index')
            ->assertViewHas('captains');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_captain(): void
    {
        $response = $this->get(route('captains.create'));

        $response->assertOk()->assertViewIs('app.captains.create');
    }

    /**
     * @test
     */
    public function it_stores_the_captain(): void
    {
        $data = Captain::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('captains.store'), $data);

        $this->assertDatabaseHas('captains', $data);

        $captain = Captain::latest('id')->first();

        $response->assertRedirect(route('captains.edit', $captain));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_captain(): void
    {
        $captain = Captain::factory()->create();

        $response = $this->get(route('captains.show', $captain));

        $response
            ->assertOk()
            ->assertViewIs('app.captains.show')
            ->assertViewHas('captain');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_captain(): void
    {
        $captain = Captain::factory()->create();

        $response = $this->get(route('captains.edit', $captain));

        $response
            ->assertOk()
            ->assertViewIs('app.captains.edit')
            ->assertViewHas('captain');
    }

    /**
     * @test
     */
    public function it_updates_the_captain(): void
    {
        $captain = Captain::factory()->create();

        $vehicle = Vehicle::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique->email(),
            'address' => $this->faker->address(),
            'vehicle_number' => $this->faker->unique->text(255),
            'license_image' => $this->faker->text(255),
            'vehicle_catalog_image' => $this->faker->text(255),
            'birth_certificate_image' => $this->faker->text(255),
            'status' => 'active',
            'lat' => $this->faker->randomNumber(1),
            'long' => $this->faker->randomNumber(1),
            'phone' => $this->faker->unique->phoneNumber(),
            'otp' => $this->faker->unique->text(255),
            'isVerified' => $this->faker->randomNumber(0),
            'vehicle_id' => $vehicle->id,
        ];

        $response = $this->put(route('captains.update', $captain), $data);

        $data['id'] = $captain->id;

        $this->assertDatabaseHas('captains', $data);

        $response->assertRedirect(route('captains.edit', $captain));
    }

    /**
     * @test
     */
    public function it_deletes_the_captain(): void
    {
        $captain = Captain::factory()->create();

        $response = $this->delete(route('captains.destroy', $captain));

        $response->assertRedirect(route('captains.index'));

        $this->assertModelMissing($captain);
    }
}
