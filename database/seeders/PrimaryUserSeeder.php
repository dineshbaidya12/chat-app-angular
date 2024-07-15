<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PrimaryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 2,
            'first_name' => 'Dinesh',
            'last_name' => 'Baidya',
            'name' => 'Dinesh Baidya',
            'username' => 'dinesh',
            'email' => 'dinesh@yopmail.com',
            'password' => Hash::make('Admin1!'),
            'role' => 'user',
            'status' => 'active',
            'email_verified' => 'done',
            'otp' => null,
            'otp_requested_at' => null,
            'user_token' => 'ZGluZXNoMg==',
            'first_welcome' => 'done',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('user_details')->insert([
            'user_id' => '2',
            'theme' => 'dark'
        ]);
    }
}
