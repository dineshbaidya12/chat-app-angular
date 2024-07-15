<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => '',
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'dineshbaidya15@gmail.com',
            'password' => Hash::make('Admin1!'),
            'role' => 'admin',
            'status' => 'active',
            'email_verified' => 'done',
            'otp' => null,
            'otp_requested_at' => null,
            'user_token' => 'YWRtaW4x',
            'first_welcome' => 'done',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}