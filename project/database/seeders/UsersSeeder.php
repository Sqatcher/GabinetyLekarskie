<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'First',
            'surname' => 'First',
            'email' => 'first.name@email.com',
            'password' => bcrypt('first'),
            'role'=>1, //1 = admin
            'facility'=>1
        ]);
        DB::table('users')->insert([
            'name' => 'Second',
            'surname' => 'Second',
            'email' => 'second.name@email.com',
            'password' => bcrypt('second'),
            'role'=>2, //2 = kierownik
            'facility' => 2
        ]);
        DB::table('users')->insert([
            'name' => 'Third',
            'surname' => 'Third',
            'email' => 'third.name@email.com',
            'password' => bcrypt('third'),
            'role'=>3,
            'facility' => 2
        ]);
        DB::table('users')->insert([
            'name' => 'Fourth',
            'surname' => 'Fourth',
            'email' => 'fourth.name@email.com',
            'password' => bcrypt('fourth'),
            'role'=>2,
            'facility' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Fifth',
            'surname' => 'Fifth',
            'email' => 'fifth.name@email.com',
            'password' => bcrypt('fifth'),
            'role'=>4,
            'facility' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Adam',
            'surname' => 'Doe',
            'email' => 'adam.doe@email.com',
            'password' => bcrypt('adamdoe'),
            'role'=>4, //2 = kierownik
            'facility' => 2
        ]);

    }
}
