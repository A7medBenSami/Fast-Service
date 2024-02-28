<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Shipment;
use App\Models\ReceiverData;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReceiverDataShipmentsTest extends TestCase
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
    public function it_gets_receiver_data_shipments(): void
    {
        $receiverData = ReceiverData::factory()->create();
        $shipments = Shipment::factory()
            ->count(2)
            ->create([
                'receiver_data_id' => $receiverData->id,
            ]);

        $response = $this->getJson(
            route('api.all-receiver-data.shipments.index', $receiverData)
        );

        $response->assertOk()->assertSee($shipments[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_receiver_data_shipments(): void
    {
        $receiverData = ReceiverData::factory()->create();
        $data = Shipment::factory()
            ->make([
                'receiver_data_id' => $receiverData->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.all-receiver-data.shipments.store', $receiverData),
            $data
        );

        $this->assertDatabaseHas('shipments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $shipment = Shipment::latest('id')->first();

        $this->assertEquals($receiverData->id, $shipment->receiver_data_id);
    }
}
