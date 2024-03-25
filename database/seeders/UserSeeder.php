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

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('SampleUserPassword!'),
            'usertype' => 0,
            'email_verified_at' => "2024-03-24 17:30:00",
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mavenecommerce.com',
            'password' => Hash::make('SecureAdminPassword123!'),
            'usertype' => 1,
            'email_verified_at' => "2024-03-24 17:30:00",
        ]);
    }
}
