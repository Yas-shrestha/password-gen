<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        DB::table('users')->insert([
            [
                'name' => Str::random(10),
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456789'),
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),
            ],
            [
                'name' => Str::random(10),
                'email' => 'user@gmail.com',
                'password' => Hash::make('123456789'),
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),
            ],

        ]);
    }
}
