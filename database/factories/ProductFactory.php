<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [

            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(2000,50000),
            'discount' => fake()->numberBetween(1,2),

        ];
    }
}
