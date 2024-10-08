<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'image' => $this->faker->optional()->imageUrl() ?? 'https://via.placeholder.com/150',
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(1000, 100000),
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}
