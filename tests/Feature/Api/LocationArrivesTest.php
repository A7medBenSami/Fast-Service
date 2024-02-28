<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Arrive;
use App\Models\Location;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocationArrivesTest extends TestCase
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
    public function it_gets_location_arrives(): void
    {
        $location = Location::factory()->create();
        $arrives = Arrive::factory()
            ->count(2)
            ->create([
                'location_id' => $location->id,
            ]);

        $response = $this->getJson(
            route('api.locations.arrives.index', $location)
        );

        $response->assertOk()->assertSee($arrives[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_location_arrives(): void
    {
        $location = Location::factory()->create();
        $data = Arrive::factory()
            ->make([
                'location_id' => $location->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.locations.arrives.store', $location),
            $data
        );

        $this->assertDatabaseHas('arrives', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $arrive = Arrive::latest('id')->first();

        $this->assertEquals($location->id, $arrive->location_id);
    }
}
