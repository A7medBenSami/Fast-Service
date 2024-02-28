<?php

namespace Database\Seeders;

use App\Models\SenderData;
use Illuminate\Database\Seeder;

class SenderDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SenderData::factory()
            ->count(5)
            ->create();
    }
}
