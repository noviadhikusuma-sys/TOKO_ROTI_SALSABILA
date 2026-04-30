<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(asText: true);
        $defaultImages = [
            '/images/products/abon-gulung-solo.svg',
            '/images/products/intip-mini-krispi.svg',
            '/images/products/keripik-cakar-pedas.svg',
            '/images/products/kue-semprong-wijen.svg',
        ];

        return [
            'name' => Str::title($name),
            'slug' => Str::slug($name) . '-' . fake()->unique()->numberBetween(10, 999),
            'category' => fake()->randomElement(['Keripik', 'Kue Kering', 'Snack Tradisional']),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(18000, 85000),
            'weight' => fake()->randomElement(['150 gram', '200 gram', '250 gram', '500 gram']),
            'stock' => fake()->numberBetween(5, 80),
            'is_featured' => fake()->boolean(35),
            'image_url' => fake()->randomElement($defaultImages),
        ];
    }
}
