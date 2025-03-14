<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Asad Khan',
            'email' => 'admin@gmail.com',
            'registration_date' => now(),
            'password' => Hash::make('Admin12#'), // Always use Hash::make to hash passwords
            'status' => 1, // Active status
            'role_id' => DB::table('roles')->where('name', 'admin')->first()->id, // Get the admin role ID
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
