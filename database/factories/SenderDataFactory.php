<?php

namespace Database\Factories;

use App\Models\SenderData;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SenderDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SenderData::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'remarks' => $this->faker->text(),
        ];
    }
}
