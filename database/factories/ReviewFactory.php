<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => function(){

                return Product::all()->random();
            },
            'customer' => fake()->name(),
            'review' => fake()->paragraph(),
            'star' => fake()->numberBetween(0,5),

        ];
    }
}
