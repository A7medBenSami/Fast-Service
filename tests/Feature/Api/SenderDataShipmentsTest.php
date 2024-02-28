<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Shipment;
use App\Models\SenderData;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SenderDataShipmentsTest extends TestCase
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
    public function it_gets_sender_data_shipments(): void
    {
        $senderData = SenderData::factory()->create();
        $shipments = Shipment::factory()
            ->count(2)
            ->create([
                'sender_data_id' => $senderData->id,
            ]);

        $response = $this->getJson(
            route('api.all-sender-data.shipments.index', $senderData)
        );

        $response->assertOk()->assertSee($shipments[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_sender_data_shipments(): void
    {
        $senderData = SenderData::factory()->create();
        $data = Shipment::factory()
            ->make([
                'sender_data_id' => $senderData->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.all-sender-data.shipments.store', $senderData),
            $data
        );

        $this->assertDatabaseHas('shipments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $shipment = Shipment::latest('id')->first();

        $this->assertEquals($senderData->id, $shipment->sender_data_id);
    }
}
