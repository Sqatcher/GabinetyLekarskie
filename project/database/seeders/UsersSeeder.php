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
            'role'=>4,
            'facility' => 2
        ]);
        DB::table('users')->insert([
            'name' => 'Admin',
            'surname' => 'Istrator',
            'email' => 'administrator@email.com',
            'password' => bcrypt('administrator'),
            'role'=>1,
            'facility' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Kier',
            'surname' => 'Ownik',
            'email' => 'kierownik@email.com',
            'password' => bcrypt('kierownik'),
            'role'=>2,
            'facility' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Praco',
            'surname' => 'Wnik',
            'email' => 'pracownik@email.com',
            'password' => bcrypt('pracownik'),
            'role'=>3,
            'facility' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Ksie',
            'surname' => 'Gowy',
            'email' => 'ksiegowy@email.com',
            'password' => bcrypt('ksiegowy'),
            'role'=>4,
            'facility' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Maga',
            'surname' => 'Zynier',
            'email' => 'magazynier@email.com',
            'password' => bcrypt('magazynier'),
            'role'=>5,
            'facility' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'Recep',
            'surname' => 'Cjonista',
            'email' => 'recepcjonista@email.com',
            'password' => bcrypt('recepcjonista'),
            'role'=>6,
            'facility' => 1
        ]);
    }
}
