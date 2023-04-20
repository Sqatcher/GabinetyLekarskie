<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(FacilitySeeder::class);
    }
}
