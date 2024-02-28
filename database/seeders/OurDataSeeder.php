<?php

namespace Database\Seeders;

use App\Models\OurData;
use Illuminate\Database\Seeder;

class OurDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OurData::factory()
            ->count(5)
            ->create();
    }
}
