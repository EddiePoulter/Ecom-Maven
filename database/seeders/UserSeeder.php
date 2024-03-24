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
            'name' => 'admin',
            'email' => 'Admin@maven.com',
            'password' => Hash::make('Team14Certified'),
            'usertype' => 1,
            'email_verified_at' => "2024-03-24 17:30:00",
        ]);
    }
}
