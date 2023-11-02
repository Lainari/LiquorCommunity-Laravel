<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_id' => 'admin',
            'nickname' => '관리자',
            'password' => Hash::make('1234'),
            'birthday' => '1999-10-21',
            'isAdmin' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
