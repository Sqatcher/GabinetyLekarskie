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
            // 1 - see your facility's items, 2 - see other facilities' items, 4 - edit items only in your facility, 8 - edit items in other facilities
            'storage' => 15, // 15 = 8 + 4 + 2 + 1, czyli może wszystko widzieć i edytować (muszą być 1+2, a nie tylko 2)
        ]);
        DB::table('roles')->insert([
            'name' => 'Kierownik',
            'users' => 21,
            'schedules' => 21,
            'storage' => 7, // 7 = 4 + 2 + 1, może wszystko oprócz edytowania innych magazynów
        ]);
        DB::table('roles')->insert([
            'name' => 'Pracownik',
            'users' => 0,
            'schedules' => 1,
            'storage' => 1, // 1, widzi tylko ze swojej placówki
        ]);
        DB::table('roles')->insert([
            'name' => 'Księgowy',
            'users' => 0,
            'schedules' => 0,
            'storage' => 3, // 3 = 2 + 1, widzi wszystkie
        ]);
        DB::table('roles')->insert([
            'name' => 'Magazynier',
            'users' => 0,
            'schedules' => 0,
            'storage' => 5, // 5 = 4 + 1, może widzieć i edytować tylko ze swojej placówki
        ]);
        DB::table('roles')->insert([
            'name' => 'Recepcjonista',
            'users' => 0,
            'schedules' => 21,
            'storage' => 0, // nie ma dostępu w ogóle
        ]);
    }
}
