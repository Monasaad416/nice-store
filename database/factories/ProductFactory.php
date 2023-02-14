<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Store;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        $slug = Str::slug($name);
        $categories = Category::pluck('id')->toArray();
        $stores = Store::pluck('id')->toArray();

        static $i = 0;
        $i++;
     
        return [
            'name' => $name,
            'slug' =>$slug,
            'category_id' => $this->faker->randomElement($categories),
            'store_id' => $this->faker->randomElement($stores),
            'price' => $this->faker->numberBetween($min = 100, $max = 6000),
            'image' =>  "products/$i.png",
            'description' =>  $this->faker->text(5000),
        ];
    }
}
