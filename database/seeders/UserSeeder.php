<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'      => 'Admin Sistama',
                'email'     => 'admin.sistama'.'@gmail.com',
                'password'  => Hash::make('admin_sistama'),
                'role_id'    => 1,
            ],
            [
                'name'      => 'Dandi Mulyadi',
                'email'     => 'dandi123'.'@gmail.com',
                'password'  => Hash::make('dandi123'),
                'role_id'    => 2,
            ],
            [
                'name'      => 'Yamin Ahmad',
                'email'     => 'yamin123'.'@gmail.com',
                'password'  => Hash::make('yamin123'),
                'role_id'    => 3,
            ],
            [
                'name'      => 'Fifi Adnyani',
                'email'     => 'fifi123'.'@gmail.com',
                'password'  => Hash::make('fifi123'),
                'role_id'    => 3,
            ],
        ]);
    }
}
