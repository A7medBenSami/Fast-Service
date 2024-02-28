<?php

namespace Database\Seeders;

use App\Models\ReceiverData;
use Illuminate\Database\Seeder;

class ReceiverDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReceiverData::factory()
            ->count(5)
            ->create();
    }
}
