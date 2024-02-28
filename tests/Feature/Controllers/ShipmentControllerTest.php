<?php

namespace Tests\Feature\Controllers;

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
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShipmentControllerTest extends TestCase
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
    public function it_displays_index_view_with_shipments(): void
    {
        $shipments = Shipment::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('shipments.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.shipments.index')
            ->assertViewHas('shipments');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_shipment(): void
    {
        $response = $this->get(route('shipments.create'));

        $response->assertOk()->assertViewIs('app.shipments.create');
    }

    /**
     * @test
     */
    public function it_stores_the_shipment(): void
    {
        $data = Shipment::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('shipments.store'), $data);

        $this->assertDatabaseHas('shipments', $data);

        $shipment = Shipment::latest('id')->first();

        $response->assertRedirect(route('shipments.edit', $shipment));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_shipment(): void
    {
        $shipment = Shipment::factory()->create();

        $response = $this->get(route('shipments.show', $shipment));

        $response
            ->assertOk()
            ->assertViewIs('app.shipments.show')
            ->assertViewHas('shipment');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_shipment(): void
    {
        $shipment = Shipment::factory()->create();

        $response = $this->get(route('shipments.edit', $shipment));

        $response
            ->assertOk()
            ->assertViewIs('app.shipments.edit')
            ->assertViewHas('shipment');
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

        $response = $this->put(route('shipments.update', $shipment), $data);

        $data['id'] = $shipment->id;

        $this->assertDatabaseHas('shipments', $data);

        $response->assertRedirect(route('shipments.edit', $shipment));
    }

    /**
     * @test
     */
    public function it_deletes_the_shipment(): void
    {
        $shipment = Shipment::factory()->create();

        $response = $this->delete(route('shipments.destroy', $shipment));

        $response->assertRedirect(route('shipments.index'));

        $this->assertModelMissing($shipment);
    }
}
