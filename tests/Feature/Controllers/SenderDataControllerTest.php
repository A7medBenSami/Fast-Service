<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\SenderData;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SenderDataControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_sender_data(): void
    {
        $allSenderData = SenderData::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-sender-data.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_sender_data.index')
            ->assertViewHas('allSenderData');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_sender_data(): void
    {
        $response = $this->get(route('all-sender-data.create'));

        $response->assertOk()->assertViewIs('app.all_sender_data.create');
    }

    /**
     * @test
     */
    public function it_stores_the_sender_data(): void
    {
        $data = SenderData::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-sender-data.store'), $data);

        $this->assertDatabaseHas('sender_data', $data);

        $senderData = SenderData::latest('id')->first();

        $response->assertRedirect(route('all-sender-data.edit', $senderData));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_sender_data(): void
    {
        $senderData = SenderData::factory()->create();

        $response = $this->get(route('all-sender-data.show', $senderData));

        $response
            ->assertOk()
            ->assertViewIs('app.all_sender_data.show')
            ->assertViewHas('senderData');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_sender_data(): void
    {
        $senderData = SenderData::factory()->create();

        $response = $this->get(route('all-sender-data.edit', $senderData));

        $response
            ->assertOk()
            ->assertViewIs('app.all_sender_data.edit')
            ->assertViewHas('senderData');
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

        $response = $this->put(
            route('all-sender-data.update', $senderData),
            $data
        );

        $data['id'] = $senderData->id;

        $this->assertDatabaseHas('sender_data', $data);

        $response->assertRedirect(route('all-sender-data.edit', $senderData));
    }

    /**
     * @test
     */
    public function it_deletes_the_sender_data(): void
    {
        $senderData = SenderData::factory()->create();

        $response = $this->delete(
            route('all-sender-data.destroy', $senderData)
        );

        $response->assertRedirect(route('all-sender-data.index'));

        $this->assertModelMissing($senderData);
    }
}
