<?php

namespace Database\Factories;

use App\Models\OurData;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OurDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OurData::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'about_us' => $this->faker->text(),
            'privacy_policy' => $this->faker->text(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'help_and_support' => $this->faker->text(),
        ];
    }
}
