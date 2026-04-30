<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

final class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Abon Gulung Solo',
                'slug' => 'abon-gulung-solo',
                'category' => 'Kue Kering',
                'description' => 'Roti gulung abon dengan rasa gurih manis, cocok untuk oleh-oleh keluarga dan tamu luar kota.',
                'price' => 32000,
                'weight' => '200 gram',
                'stock' => 28,
                'is_featured' => true,
                'image_url' => '/images/products/abon-gulung-solo.svg',
            ],
            [
                'name' => 'Intip Mini Krispi',
                'slug' => 'intip-mini-krispi',
                'category' => 'Snack Tradisional',
                'description' => 'Intip khas Solo dengan tekstur renyah dan pilihan rasa original, balado, serta keju.',
                'price' => 25000,
                'weight' => '180 gram',
                'stock' => 35,
                'is_featured' => true,
                'image_url' => '/images/products/intip-mini-krispi.svg',
            ],
            [
                'name' => 'Keripik Cakar Pedas',
                'slug' => 'keripik-cakar-pedas',
                'category' => 'Keripik',
                'description' => 'Camilan gurih pedas favorit anak muda, dikemas praktis untuk perjalanan jauh.',
                'price' => 22000,
                'weight' => '150 gram',
                'stock' => 42,
                'is_featured' => false,
                'image_url' => '/images/products/keripik-cakar-pedas.svg',
            ],
            [
                'name' => 'Kue Semprong Wijen',
                'slug' => 'kue-semprong-wijen',
                'category' => 'Kue Kering',
                'description' => 'Kue semprong tipis dan harum wijen, cocok untuk hampers maupun suguhan keluarga.',
                'price' => 30000,
                'weight' => '250 gram',
                'stock' => 16,
                'is_featured' => true,
                'image_url' => '/images/products/kue-semprong-wijen.svg',
            ],
        ];

        foreach ($products as $product) {
            Product::query()->updateOrCreate(
                ['slug' => $product['slug']],
                $product,
            );
        }
    }
}
