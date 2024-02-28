<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->text(255),
            'email' => $this->faker->email(),
            'street' => $this->faker->streetName(),
            'city' => $this->faker->city(),
            'district' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
            'captain_id' => \App\Models\Captain::factory(),
        ];
    }
}
