<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            'schedule_owner' => 'r13_1',
            'owner_type' => 2,
            'date_start'=>"23-04-2023 11:00:00",
            'date_end'=>"23-04-2023 13:00:00",
            'type'=>1,
        ]);
        DB::table('schedules')->insert([
            'schedule_owner' => 'k3_1',
            'owner_type' => 1,
            'date_start'=>"23-04-2023 11:00:00",
            'date_end'=>"23-04-2023 13:00:00",
            'type'=>1,
        ]);

        DB::table('schedules')->insert([
            'schedule_owner' => 'room3_2',
            'owner_type' => 2,
            'date_start'=>"18-04-2023 10:30:00",
            'date_end'=>"18-04-2023 12:30:00",
            'type'=>2,
        ]);
        DB::table('schedules')->insert([
            'schedule_owner' => 'k1_2',
            'owner_type' => 1,
            'date_start'=>"18-04-2023 10:30:00",
            'date_end'=>"18-04-2023 12:30:00",
            'type'=>2,
        ]);

        for ($i = 0; $i < 12; $i++)
        {
            DB::table('schedules')->insert([
                'schedule_owner' => 'k'.$i.'_1',
                'owner_type' => 1,
                'date_start'=>"20-05-2023 10:30:00",
                'date_end'=>"20-05-2023 12:30:00",
                'type'=>rand(1,2),
            ]);

            DB::table('schedules')->insert([
                'schedule_owner' => 'k'.$i.'_1',
                'owner_type' => 1,
                'date_start'=>"17-06-2023 10:30:00",
                'date_end'=>"17-06-2023 12:30:00",
                'type'=>rand(1,2),
            ]);
        }
    }
}
