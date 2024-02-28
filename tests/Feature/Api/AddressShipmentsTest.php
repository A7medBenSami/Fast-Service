<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Address;
use App\Models\Shipment;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressShipmentsTest extends TestCase
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
    public function it_gets_address_shipments(): void
    {
        $address = Address::factory()->create();
        $shipments = Shipment::factory()
            ->count(2)
            ->create([
                'address_id' => $address->id,
            ]);

        $response = $this->getJson(
            route('api.addresses.shipments.index', $address)
        );

        $response->assertOk()->assertSee($shipments[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_address_shipments(): void
    {
        $address = Address::factory()->create();
        $data = Shipment::factory()
            ->make([
                'address_id' => $address->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.addresses.shipments.store', $address),
            $data
        );

        $this->assertDatabaseHas('shipments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $shipment = Shipment::latest('id')->first();

        $this->assertEquals($address->id, $shipment->address_id);
    }
}
