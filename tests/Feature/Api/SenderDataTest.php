<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SenderData;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SenderDataTest extends TestCase
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
    public function it_gets_all_sender_data_list(): void
    {
        $allSenderData = SenderData::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-sender-data.index'));

        $response->assertOk()->assertSee($allSenderData[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_sender_data(): void
    {
        $data = SenderData::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-sender-data.store'), $data);

        $this->assertDatabaseHas('sender_data', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_sender_data(): void
    {
        $senderData = SenderData::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'remarks' => $this->faker->text(),
        ];

        $response = $this->putJson(
            route('api.all-sender-data.update', $senderData),
            $data
        );

        $data['id'] = $senderData->id;

        $this->assertDatabaseHas('sender_data', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_sender_data(): void
    {
        $senderData = SenderData::factory()->create();

        $response = $this->deleteJson(
            route('api.all-sender-data.destroy', $senderData)
        );

        $this->assertModelMissing($senderData);

        $response->assertNoContent();
    }
}
