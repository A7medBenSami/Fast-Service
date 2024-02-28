<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Arrive;

use App\Models\Captain;
use App\Models\Vehicle;
use App\Models\Address;
use App\Models\Location;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArriveControllerTest extends TestCase
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
    public function it_displays_index_view_with_arrives(): void
    {
        $arrives = Arrive::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('arrives.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.arrives.index')
            ->assertViewHas('arrives');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_arrive(): void
    {
        $response = $this->get(route('arrives.create'));

        $response->assertOk()->assertViewIs('app.arrives.create');
    }

    /**
     * @test
     */
    public function it_stores_the_arrive(): void
    {
        $data = Arrive::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('arrives.store'), $data);

        $this->assertDatabaseHas('arrives', $data);

        $arrive = Arrive::latest('id')->first();

        $response->assertRedirect(route('arrives.edit', $arrive));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_arrive(): void
    {
        $arrive = Arrive::factory()->create();

        $response = $this->get(route('arrives.show', $arrive));

        $response
            ->assertOk()
            ->assertViewIs('app.arrives.show')
            ->assertViewHas('arrive');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_arrive(): void
    {
        $arrive = Arrive::factory()->create();

        $response = $this->get(route('arrives.edit', $arrive));

        $response
            ->assertOk()
            ->assertViewIs('app.arrives.edit')
            ->assertViewHas('arrive');
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

        $response = $this->put(route('arrives.update', $arrive), $data);

        $data['id'] = $arrive->id;

        $this->assertDatabaseHas('arrives', $data);

        $response->assertRedirect(route('arrives.edit', $arrive));
    }

    /**
     * @test
     */
    public function it_deletes_the_arrive(): void
    {
        $arrive = Arrive::factory()->create();

        $response = $this->delete(route('arrives.destroy', $arrive));

        $response->assertRedirect(route('arrives.index'));

        $this->assertModelMissing($arrive);
    }
}
