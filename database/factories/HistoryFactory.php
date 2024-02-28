<?php

namespace Database\Factories;

use App\Models\History;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = History::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'vehicle' => $this->faker->text(255),
            'user_id' => $this->faker->text(255),
            'captain_id' => $this->faker->text(255),
            'from_lat' => $this->faker->text(255),
            'from_long' => $this->faker->text(255),
            'to_lat' => $this->faker->text(255),
            'to_long' => $this->faker->text(255),
            'status' => $this->faker->word(),
        ];
    }
}
