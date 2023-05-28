<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'Super Admin',
            'image' => 'None',
            'level' => 'Super Admin',
            'status' => 'Aktif',
            'password' => bcrypt("superadmin"),
            'no_hp' => '087733798090',
            'email' => 'superadmin@gmail.com',
        ]);
        DB::table('users')->insert([
            'nama' => 'admin',
            'image' => 'None',
            'level' => 'Admin',
            'status' => 'Aktif',
            'password' => bcrypt("admin"),
            'no_hp' => '087733',
            'email' => 'admin@gmail.com',
        ]);
        DB::table('users')->insert([
            'nama' => 'Rian',
            'image' => 'None',
            'level' => 'User',
            'status' => 'Aktif',
            'password' => bcrypt("rian"),
            'no_hp' => '087733',
            'email' => 'rian@gmail.com',
        ]);
    }
}
