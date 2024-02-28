<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Captain;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleCaptainsTest extends TestCase
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
    public function it_gets_vehicle_captains(): void
    {
        $vehicle = Vehicle::factory()->create();
        $captains = Captain::factory()
            ->count(2)
            ->create([
                'vehicle_id' => $vehicle->id,
            ]);

        $response = $this->getJson(
            route('api.vehicles.captains.index', $vehicle)
        );

        $response->assertOk()->assertSee($captains[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_vehicle_captains(): void
    {
        $vehicle = Vehicle::factory()->create();
        $data = Captain::factory()
            ->make([
                'vehicle_id' => $vehicle->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.vehicles.captains.store', $vehicle),
            $data
        );

        $this->assertDatabaseHas('captains', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $captain = Captain::latest('id')->first();

        $this->assertEquals($vehicle->id, $captain->vehicle_id);
    }
}
