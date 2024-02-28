<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Shipment;

use App\Models\Captain;
use App\Models\Vehicle;
use App\Models\Address;
use App\Models\Category;
use App\Models\Location;
use App\Models\SenderData;
use App\Models\ReceiverData;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShipmentTest extends TestCase
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
    public function it_gets_shipments_list(): void
    {
        $shipments = Shipment::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.shipments.index'));

        $response->assertOk()->assertSee($shipments[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_shipment(): void
    {
        $data = Shipment::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.shipments.store'), $data);

        $this->assertDatabaseHas('shipments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_shipment(): void
    {
        $shipment = Shipment::factory()->create();

        $captain = Captain::factory()->create();
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $vehicle = Vehicle::factory()->create();
        $address = Address::factory()->create();
        $receiverData = ReceiverData::factory()->create();
        $senderData = SenderData::factory()->create();
        $location = Location::factory()->create();

        $data = [
            'date' => $this->faker->date(),
            'from_lat' => $this->faker->randomNumber(1),
            'from_long' => $this->faker->randomNumber(1),
            'to_lat' => $this->faker->randomNumber(1),
            'to_long' => $this->faker->randomNumber(1),
            'description' => $this->faker->sentence(15),
            'cost' => $this->faker->randomNumber(1),
            'status' => 'upcoming',
            'address' => $this->faker->address(),
            'captain_id' => $captain->id,
            'user_id' => $user->id,
            'category_id' => $category->id,
            'vehicle_id' => $vehicle->id,
            'address_id' => $address->id,
            'receiver_data_id' => $receiverData->id,
            'sender_data_id' => $senderData->id,
            'location_id' => $location->id,
        ];

        $response = $this->putJson(
            route('api.shipments.update', $shipment),
            $data
        );

        $data['id'] = $shipment->id;

        $this->assertDatabaseHas('shipments', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_shipment(): void
    {
        $shipment = Shipment::factory()->create();

        $response = $this->deleteJson(
            route('api.shipments.destroy', $shipment)
        );

        $this->assertModelMissing($shipment);

        $response->assertNoContent();
    }
}
