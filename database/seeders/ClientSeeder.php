<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name' => 'mona',
            'email' => 'mona@gmail.com',
            'email_verified_at' => now(),
            'phone' => '+6538734637354',
            'address' => 'abc street',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ]);
    }
}
