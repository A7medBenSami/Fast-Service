<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Arrive;
use App\Models\Address;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressArrivesTest extends TestCase
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
    public function it_gets_address_arrives(): void
    {
        $address = Address::factory()->create();
        $arrives = Arrive::factory()
            ->count(2)
            ->create([
                'address_id' => $address->id,
            ]);

        $response = $this->getJson(
            route('api.addresses.arrives.index', $address)
        );

        $response->assertOk()->assertSee($arrives[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_address_arrives(): void
    {
        $address = Address::factory()->create();
        $data = Arrive::factory()
            ->make([
                'address_id' => $address->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.addresses.arrives.store', $address),
            $data
        );

        $this->assertDatabaseHas('arrives', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $arrive = Arrive::latest('id')->first();

        $this->assertEquals($address->id, $arrive->address_id);
    }
}
