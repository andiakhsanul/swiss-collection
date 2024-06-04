<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categories;
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

        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' =>  Hash::make('1234'),
            'isAdmin' => '1',
        ]);
        DB::table('categories_video')->insert(
            ['nama_categories_video' => 'ABS'],
        );
        DB::table('categories_video')->insert(
            ['nama_categories_video' => 'Arms'],
        );
    }
}
