<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Captain;
use App\Models\Shipment;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaptainShipmentsTest extends TestCase
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
    public function it_gets_captain_shipments(): void
    {
        $captain = Captain::factory()->create();
        $shipments = Shipment::factory()
            ->count(2)
            ->create([
                'captain_id' => $captain->id,
            ]);

        $response = $this->getJson(
            route('api.captains.shipments.index', $captain)
        );

        $response->assertOk()->assertSee($shipments[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_captain_shipments(): void
    {
        $captain = Captain::factory()->create();
        $data = Shipment::factory()
            ->make([
                'captain_id' => $captain->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.captains.shipments.store', $captain),
            $data
        );

        $this->assertDatabaseHas('shipments', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $shipment = Shipment::latest('id')->first();

        $this->assertEquals($captain->id, $shipment->captain_id);
    }
}
