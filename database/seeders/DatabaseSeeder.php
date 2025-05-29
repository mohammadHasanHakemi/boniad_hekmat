<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            // افزودن داده‌های فیک به جدول users
        $users = [
            [
                'name' => 'علی حسینی',
                'username' => 'a',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مریم رضایی',
                'username' => 'b',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'رضا محمدی',
                'username' => 'c',
                'password' => Hash::make('12345678'),
                'role' => 'master',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);

        // افزودن داده‌های فیک به جدول requests
        $requests = [
            [
                'user_id' => 1,
                'name' => 'علی',
                'female' => 'حسینی',
                'grade' => '11',
                'nationalcode' => '1234567890',
                'phone' => '09123456789',
                'story' => 'submit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'مریم',
                'female' => 'رضایی',
                'nationalcode' => '0987654321',
                'phone' => '09129876543',
                'grade' => '11',
                'story' => 'submit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'رضا',
                'female' => 'محمدی',
                'nationalcode' => '1122334455',
                'grade' => '11',
                'phone' => '09121122334',
                'story' => 'submit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('requests')->insert($requests);

    }
}
