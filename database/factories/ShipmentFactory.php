<?php

namespace Database\Factories;

use App\Models\Shipment;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shipment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'from_lat' => $this->faker->randomNumber(1),
            'from_long' => $this->faker->randomNumber(1),
            'to_lat' => $this->faker->randomNumber(1),
            'to_long' => $this->faker->randomNumber(1),
            'description' => $this->faker->sentence(15),
            'cost' => $this->faker->randomNumber(1),
            'status' => 'upcoming',
            'address' => $this->faker->address(),
            'captain_id' => \App\Models\Captain::factory(),
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'vehicle_id' => \App\Models\Vehicle::factory(),
            'address_id' => \App\Models\Address::factory(),
            'receiver_data_id' => \App\Models\ReceiverData::factory(),
            'sender_data_id' => \App\Models\SenderData::factory(),
            'location_id' => \App\Models\Location::factory(),
        ];
    }
}
