<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomNumber(4),
            'image_path' => $this->faker->imageUrl(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            $tags = Tag::factory()->count(rand(1, 3))->create();
            $product->tags()->attach($tags);
        });
    }
}