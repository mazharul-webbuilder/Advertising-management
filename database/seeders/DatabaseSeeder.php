<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*Insert Demo User*/
        DB::table('users')->insert([
            [
                'name' => 'Ad User',
                'email' => 'testuser@test.com',
                'password' => Hash::make(123456),
                'is_admin' => 0
            ], [
                'name' => 'Admin User',
                'email' => 'admin@test.com',
                'password' => Hash::make(123456),
                'is_admin' => 1
            ],

       ]);
        /*Insert Countries*/
        foreach (config('countries') as $code => $name) {
            Country::create(['code' => $code, 'name' => $name]);
        }
    }
}
