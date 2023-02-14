<?php

namespace Database\Seeders;
use App\Models\Admin;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
