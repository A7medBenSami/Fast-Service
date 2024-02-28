<?php

namespace Database\Factories;

use App\Models\Captain;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CaptainFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Captain::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique->email(),
            'address' => $this->faker->address(),
            'vehicle_number' => $this->faker->unique->text(255),
            'license_image' => $this->faker->text(255),
            'vehicle_catalog_image' => $this->faker->text(255),
            'birth_certificate_image' => $this->faker->text(255),
            'status' => 'active',
            'lat' => $this->faker->randomNumber(1),
            'long' => $this->faker->randomNumber(1),
            'phone' => $this->faker->unique->phoneNumber(),
            'otp' => $this->faker->unique->text(255),
            'isVerified' => $this->faker->randomNumber(0),
            'vehicle_id' => \App\Models\Vehicle::factory(),
        ];
    }
}
