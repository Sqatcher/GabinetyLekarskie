<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert([
            'name' => 'Kraków - Krowodrza',
            'city' => "Kraków",
            'address' => "Koziołków 21",
        ]);
        DB::table('facilities')->insert([
            'name' => 'Kraków - Centrum',
            'city' => "Kraków",
            'address' => "Królików 37",
        ]);
        DB::table('facilities')->insert([
            'name' => 'Kraków - Podgórze',
            'city' => "Kraków",
            'address' => "Karpiów 40",
        ]);
        DB::table('facilities')->insert([
            'name' => 'Zielona Góra - Przylep',
            'city' => "Zielona Góra",
            'address' => "Zebr 20",
        ]);
        DB::table('facilities')->insert([
            'name' => 'Zamość - Stare Miasto',
            'city' => "Zamość",
            'address' => "Zimorodka 8",
        ]);
    }
}
