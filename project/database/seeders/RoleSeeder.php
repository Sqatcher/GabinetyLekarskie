<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrator',
            'users' => 11,
            'schedules' => 11,
        ]);
        DB::table('roles')->insert([
            'name' => 'Kierownik',
            'users' => 21,
            'schedules' => 21,
        ]);
        DB::table('roles')->insert([
            'name' => 'Pracownik',
            'users' => 0,
            'schedules' => 1,
        ]);
        DB::table('roles')->insert([
            'name' => 'Księgowy',
            'users' => 0,
            'schedules' => 0,
        ]);
        DB::table('roles')->insert([
            'name' => 'Magazynier',
            'users' => 0,
            'schedules' => 0,
        ]);
        DB::table('roles')->insert([
            'name' => 'Recepcjonista',
            'users' => 0,
            'schedules' => 21,
        ]);
    }
}
