<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Arrive;
use App\Models\Captain;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaptainArrivesTest extends TestCase
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
    public function it_gets_captain_arrives(): void
    {
        $captain = Captain::factory()->create();
        $arrives = Arrive::factory()
            ->count(2)
            ->create([
                'captain_id' => $captain->id,
            ]);

        $response = $this->getJson(
            route('api.captains.arrives.index', $captain)
        );

        $response->assertOk()->assertSee($arrives[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_captain_arrives(): void
    {
        $captain = Captain::factory()->create();
        $data = Arrive::factory()
            ->make([
                'captain_id' => $captain->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.captains.arrives.store', $captain),
            $data
        );

        $this->assertDatabaseHas('arrives', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $arrive = Arrive::latest('id')->first();

        $this->assertEquals($captain->id, $arrive->captain_id);
    }
}
