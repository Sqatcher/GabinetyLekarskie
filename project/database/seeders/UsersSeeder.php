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
    }
}
