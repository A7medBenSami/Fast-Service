<?php

namespace Database\Seeders;

use App\Models\Arrive;
use Illuminate\Database\Seeder;

class ArriveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Arrive::factory()
            ->count(5)
            ->create();
    }
}
