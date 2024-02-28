<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ReceiverData;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReceiverDataControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_receiver_data(): void
    {
        $allReceiverData = ReceiverData::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-receiver-data.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_receiver_data.index')
            ->assertViewHas('allReceiverData');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_receiver_data(): void
    {
        $response = $this->get(route('all-receiver-data.create'));

        $response->assertOk()->assertViewIs('app.all_receiver_data.create');
    }

    /**
     * @test
     */
    public function it_stores_the_receiver_data(): void
    {
        $data = ReceiverData::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-receiver-data.store'), $data);

        $this->assertDatabaseHas('receiver_data', $data);

        $receiverData = ReceiverData::latest('id')->first();

        $response->assertRedirect(
            route('all-receiver-data.edit', $receiverData)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_receiver_data(): void
    {
        $receiverData = ReceiverData::factory()->create();

        $response = $this->get(route('all-receiver-data.show', $receiverData));

        $response
            ->assertOk()
            ->assertViewIs('app.all_receiver_data.show')
            ->assertViewHas('receiverData');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_receiver_data(): void
    {
        $receiverData = ReceiverData::factory()->create();

        $response = $this->get(route('all-receiver-data.edit', $receiverData));

        $response
            ->assertOk()
            ->assertViewIs('app.all_receiver_data.edit')
            ->assertViewHas('receiverData');
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

        $response = $this->put(
            route('all-receiver-data.update', $receiverData),
            $data
        );

        $data['id'] = $receiverData->id;

        $this->assertDatabaseHas('receiver_data', $data);

        $response->assertRedirect(
            route('all-receiver-data.edit', $receiverData)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_receiver_data(): void
    {
        $receiverData = ReceiverData::factory()->create();

        $response = $this->delete(
            route('all-receiver-data.destroy', $receiverData)
        );

        $response->assertRedirect(route('all-receiver-data.index'));

        $this->assertModelMissing($receiverData);
    }
}
