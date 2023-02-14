<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'name' => 'Fstore',
            'slug' => 'f-store',
            'email' => 'fstore@gmail.com',
            'email_verified_at' => now(),
            'phone' => '+6538734637354',
            'address' => 'abc street',
            'category_id' => 1,
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ]);
    }
}
