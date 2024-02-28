<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Captain;

use App\Models\Vehicle;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaptainTest extends TestCase
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
    public function it_gets_captains_list(): void
    {
        $captains = Captain::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.captains.index'));

        $response->assertOk()->assertSee($captains[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_captain(): void
    {
        $data = Captain::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.captains.store'), $data);

        $this->assertDatabaseHas('captains', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(
            route('api.captains.update', $captain),
            $data
        );

        $data['id'] = $captain->id;

        $this->assertDatabaseHas('captains', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_captain(): void
    {
        $captain = Captain::factory()->create();

        $response = $this->deleteJson(route('api.captains.destroy', $captain));

        $this->assertModelMissing($captain);

        $response->assertNoContent();
    }
}
