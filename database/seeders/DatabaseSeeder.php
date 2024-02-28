<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(AddressSeeder::class);
        $this->call(ArriveSeeder::class);
        $this->call(CaptainSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(HistorySeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(OurDataSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(ReceiverDataSeeder::class);
        $this->call(SenderDataSeeder::class);
        $this->call(ShipmentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VehicleSeeder::class);
    }
}
