<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Arrive;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserArrivesTest extends TestCase
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
    public function it_gets_user_arrives(): void
    {
        $user = User::factory()->create();
        $arrives = Arrive::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.arrives.index', $user));

        $response->assertOk()->assertSee($arrives[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_user_arrives(): void
    {
        $user = User::factory()->create();
        $data = Arrive::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.arrives.store', $user),
            $data
        );

        $this->assertDatabaseHas('arrives', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $arrive = Arrive::latest('id')->first();

        $this->assertEquals($user->id, $arrive->user_id);
    }
}
