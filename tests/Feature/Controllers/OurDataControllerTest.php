<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\OurData;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OurDataControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_our_data(): void
    {
        $allOurData = OurData::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-our-data.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_our_data.index')
            ->assertViewHas('allOurData');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_our_data(): void
    {
        $response = $this->get(route('all-our-data.create'));

        $response->assertOk()->assertViewIs('app.all_our_data.create');
    }

    /**
     * @test
     */
    public function it_stores_the_our_data(): void
    {
        $data = OurData::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-our-data.store'), $data);

        $this->assertDatabaseHas('our_data', $data);

        $ourData = OurData::latest('id')->first();

        $response->assertRedirect(route('all-our-data.edit', $ourData));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_our_data(): void
    {
        $ourData = OurData::factory()->create();

        $response = $this->get(route('all-our-data.show', $ourData));

        $response
            ->assertOk()
            ->assertViewIs('app.all_our_data.show')
            ->assertViewHas('ourData');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_our_data(): void
    {
        $ourData = OurData::factory()->create();

        $response = $this->get(route('all-our-data.edit', $ourData));

        $response
            ->assertOk()
            ->assertViewIs('app.all_our_data.edit')
            ->assertViewHas('ourData');
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

        $response = $this->put(route('all-our-data.update', $ourData), $data);

        $data['id'] = $ourData->id;

        $this->assertDatabaseHas('our_data', $data);

        $response->assertRedirect(route('all-our-data.edit', $ourData));
    }

    /**
     * @test
     */
    public function it_deletes_the_our_data(): void
    {
        $ourData = OurData::factory()->create();

        $response = $this->delete(route('all-our-data.destroy', $ourData));

        $response->assertRedirect(route('all-our-data.index'));

        $this->assertModelMissing($ourData);
    }
}
