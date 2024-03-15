<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            'product_id' => $this->faker->randomDigitNotNull,
            'user_id' => $this->faker->randomDigitNotNull,
            'review' => $this->faker->sentence,
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
