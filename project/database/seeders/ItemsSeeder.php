<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            'name' => 'Strzykawka',
            'count' => 3,
            'facility_id' => 1
        ]);
        DB::table('items')->insert([
            'name' => 'Butelka',
            'count' => 3,
            'facility_id' => 2
        ]);
        DB::table('items')->insert([
            'name' => 'Kroplówka',
            'count' => 5,
            'facility_id' => 2
        ]);
        DB::table('items')->insert([
            'name' => 'Łóżko',
            'count' => 1,
            'facility_id' => 1
        ]);
    }
}
