<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\ReceiverData;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReceiverDataTest extends TestCase
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
    public function it_gets_all_receiver_data_list(): void
    {
        $allReceiverData = ReceiverData::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-receiver-data.index'));

        $response->assertOk()->assertSee($allReceiverData[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_receiver_data(): void
    {
        $data = ReceiverData::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.all-receiver-data.store'),
            $data
        );

        $this->assertDatabaseHas('receiver_data', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_receiver_data(): void
    {
        $receiverData = ReceiverData::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'remarks' => $this->faker->text(255),
        ];

        $response = $this->putJson(
            route('api.all-receiver-data.update', $receiverData),
            $data
        );

        $data['id'] = $receiverData->id;

        $this->assertDatabaseHas('receiver_data', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_receiver_data(): void
    {
        $receiverData = ReceiverData::factory()->create();

        $response = $this->deleteJson(
            route('api.all-receiver-data.destroy', $receiverData)
        );

        $this->assertModelMissing($receiverData);

        $response->assertNoContent();
    }
}
