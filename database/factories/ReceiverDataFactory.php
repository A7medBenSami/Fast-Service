<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ReceiverData;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceiverDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReceiverData::class;

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
            'remarks' => $this->faker->text(255),
        ];
    }
}
