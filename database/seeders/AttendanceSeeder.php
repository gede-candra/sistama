<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendances')->insert([
            [
                'user_id'           => '3',
                'addmission_time'   => '08:05:00',
                'time_out'          => '17:22:29',
                'work_date'         => '2022-06-15',
            ],
            [
                'user_id'           => '3',
                'addmission_time'   => '07:30:00',
                'time_out'          => '17:22:29',
                'work_date'         => '2022-06-14',
            ],
            [
                'user_id'           => '4',
                'addmission_time'   => '08:01:00',
                'time_out'          => '17:00:29',
                'work_date'         => '2022-06-16',
            ],
        ]);
    }
}
