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
        'adress' => "Koziołków 21",
        ]);
        DB::table('facilities')->insert([
            'name' => 'Kraków - Centrum',
            'city' => "Kraków",
            'adress' => "Królików 37",
        ]);
        DB::table('facilities')->insert([
            'name' => 'Kraków - Podgórze',
            'city' => "Kraków",
            'adress' => "Karpiów 40",
        ]);
        DB::table('facilities')->insert([
            'name' => 'Zielona Góra - Przylep',
            'city' => "Zielona Góra",
            'adress' => "Zebr 20",
        ]);
        DB::table('facilities')->insert([
            'name' => 'Zamość - Stare Miasto',
            'city' => "Zamość",
            'adress' => "Zimorodka 8",
        ]);
    }
}
