<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->sentence(),
            'sku' => Str::random(12),
            'stock' => random_int(1, 50),
            'category' => 'Apple',
        ];
    }
}
