<?php

namespace Database\Factories;

use App\Models\Arrive;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArriveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Arrive::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'from_at' => $this->faker->randomNumber(1),
            'from_long' => $this->faker->randomNumber(1),
            'to_lat' => $this->faker->randomNumber(1),
            'to_long' => $this->faker->randomNumber(1),
            'note' => $this->faker->sentence(15),
            'cost' => $this->faker->randomNumber(1),
            'status' => 'upcoming',
            'address' => $this->faker->address(),
            'user_id' => \App\Models\User::factory(),
            'captain_id' => \App\Models\Captain::factory(),
            'vehicle_id' => \App\Models\Vehicle::factory(),
            'address_id' => \App\Models\Address::factory(),
            'location_id' => \App\Models\Location::factory(),
        ];
    }
}
