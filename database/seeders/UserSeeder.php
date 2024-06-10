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
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Tri Tổng',
            'email' => 'tritong@gmail.com',
            'password' => Hash::make('11111111'),
            'phone' => '0394866302',
            'image' => '1715268900_uocmo.jpg',
            'role_as' => '1',
        ]);

        for ($i = 1; $i < 100; $i++) {
            $user_name = 'nhom1' . $i;
            DB::table('users')->insert([
                'name' => $user_name,
                'email' => $user_name . '@gmail.com',
                'password' => Hash::make('11111111'),
                'phone' => '0900077777',
                'image' => '1715329987.png',
                'role_as' => '0',
            ]);
        }
    }
}
