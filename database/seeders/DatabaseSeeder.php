<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@a.com',
            'password' => Hash::make('pass'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin2',
            'email' => 'admin2@.com',
            'password' => Hash::make('pass'),
        ]);
    }
       
}
