<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('absensis')->insert([
            [
                'user_id'   => '2',
                'jam_masuk' => '08:05:00',
                'jam_keluar'=> '17:22:29',
                'tgl_kerja' => '2022-06-15',
            ],
            [
                'user_id'   => '2',
                'jam_masuk' => '07:30:00',
                'jam_keluar'=> '17:22:29',
                'tgl_kerja' => '2022-06-14',
            ],
            [
                'user_id'   => '3',
                'jam_masuk' => '08:01:00',
                'jam_keluar'=> '17:00:29',
                'tgl_kerja' => '2022-06-16',
            ],
        ]);
    }
}
