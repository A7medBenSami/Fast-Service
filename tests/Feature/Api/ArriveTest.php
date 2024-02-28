<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Arrive;

use App\Models\Captain;
use App\Models\Vehicle;
use App\Models\Address;
use App\Models\Location;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArriveTest extends TestCase
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
    public function it_gets_arrives_list(): void
    {
        $arrives = Arrive::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.arrives.index'));

        $response->assertOk()->assertSee($arrives[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_arrive(): void
    {
        $data = Arrive::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.arrives.store'), $data);

        $this->assertDatabaseHas('arrives', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_arrive(): void
    {
        $arrive = Arrive::factory()->create();

        $user = User::factory()->create();
        $captain = Captain::factory()->create();
        $vehicle = Vehicle::factory()->create();
        $address = Address::factory()->create();
        $location = Location::factory()->create();

        $data = [
            'date' => $this->faker->date(),
            'from_at' => $this->faker->randomNumber(1),
            'from_long' => $this->faker->randomNumber(1),
            'to_lat' => $this->faker->randomNumber(1),
            'to_long' => $this->faker->randomNumber(1),
            'note' => $this->faker->sentence(15),
            'cost' => $this->faker->randomNumber(1),
            'status' => 'upcoming',
            'address' => $this->faker->address(),
            'user_id' => $user->id,
            'captain_id' => $captain->id,
            'vehicle_id' => $vehicle->id,
            'address_id' => $address->id,
            'location_id' => $location->id,
        ];

        $response = $this->putJson(route('api.arrives.update', $arrive), $data);

        $data['id'] = $arrive->id;

        $this->assertDatabaseHas('arrives', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_arrive(): void
    {
        $arrive = Arrive::factory()->create();

        $response = $this->deleteJson(route('api.arrives.destroy', $arrive));

        $this->assertModelMissing($arrive);

        $response->assertNoContent();
    }
}
