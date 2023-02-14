<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Women','Men','Kids','Home','Accessories'];
        foreach ($categories as $cat) {
            $name = $cat;
            $slug = Str::slug($name);
            Category::create(
                [
                    'name' => $cat,
                    'slug' => $slug,
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                ],
            );
        }
    }
}
