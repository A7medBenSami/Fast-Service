<?php

namespace Database\Seeders;

use App\Models\Captain;
use Illuminate\Database\Seeder;

class CaptainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Captain::factory()
            ->count(5)
            ->create();
    }
}
