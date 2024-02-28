<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\History;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HistoryTest extends TestCase
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
    public function it_gets_histories_list(): void
    {
        $histories = History::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.histories.index'));

        $response->assertOk()->assertSee($histories[0]->date);
    }

    /**
     * @test
     */
    public function it_stores_the_history(): void
    {
        $data = History::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.histories.store'), $data);

        $this->assertDatabaseHas('histories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_history(): void
    {
        $history = History::factory()->create();

        $data = [
            'date' => $this->faker->date(),
            'vehicle' => $this->faker->text(255),
            'user_id' => $this->faker->text(255),
            'captain_id' => $this->faker->text(255),
            'from_lat' => $this->faker->text(255),
            'from_long' => $this->faker->text(255),
            'to_lat' => $this->faker->text(255),
            'to_long' => $this->faker->text(255),
            'status' => $this->faker->word(),
        ];

        $response = $this->putJson(
            route('api.histories.update', $history),
            $data
        );

        $data['id'] = $history->id;

        $this->assertDatabaseHas('histories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_history(): void
    {
        $history = History::factory()->create();

        $response = $this->deleteJson(route('api.histories.destroy', $history));

        $this->assertModelMissing($history);

        $response->assertNoContent();
    }
}
