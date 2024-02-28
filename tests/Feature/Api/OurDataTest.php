<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\OurData;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OurDataTest extends TestCase
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
    public function it_gets_all_our_data_list(): void
    {
        $allOurData = OurData::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-our-data.index'));

        $response->assertOk()->assertSee($allOurData[0]->about_us);
    }

    /**
     * @test
     */
    public function it_stores_the_our_data(): void
    {
        $data = OurData::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-our-data.store'), $data);

        $this->assertDatabaseHas('our_data', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_our_data(): void
    {
        $ourData = OurData::factory()->create();

        $data = [
            'about_us' => $this->faker->text(),
            'privacy_policy' => $this->faker->text(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'help_and_support' => $this->faker->text(),
        ];

        $response = $this->putJson(
            route('api.all-our-data.update', $ourData),
            $data
        );

        $data['id'] = $ourData->id;

        $this->assertDatabaseHas('our_data', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_our_data(): void
    {
        $ourData = OurData::factory()->create();

        $response = $this->deleteJson(
            route('api.all-our-data.destroy', $ourData)
        );

        $this->assertModelMissing($ourData);

        $response->assertNoContent();
    }
}
