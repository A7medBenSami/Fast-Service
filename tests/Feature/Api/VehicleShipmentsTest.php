<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Shipment;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleShipmentsTest extends TestCase
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
    public function it_gets_vehicle_shipments(): void
    {
        $vehicle = Vehicle::factory()->create();
        $shipments = Shipment::factory()
            ->count(2)
            ->create([
                'vehicle_id' => $vehicle->id,
            ]);

        $response = $this->getJson(
            route('api.vehicles.shipments.index', $vehicle)
        );

        $response->assertOk()->assertSee($shipments[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_vehicle_shipments(): void
    {
        $vehicle = Vehicle::factory()->create();
        $data = Shipment::factory()
            ->make([
                'vehicle_id' => $vehicle->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.vehicles.shipments.store', $vehicle),
            $data
        );

        $this->assertDatabaseHas('shipments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $shipment = Shipment::latest('id')->first();

        $this->assertEquals($vehicle->id, $shipment->vehicle_id);
    }
}
