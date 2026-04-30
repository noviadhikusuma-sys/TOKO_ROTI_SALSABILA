<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_created_from_crud_form(): void
    {
        $response = $this->post(route('products.store'), [
            'name' => 'Abon Gulung Solo',
            'category' => 'Kue Kering',
            'description' => 'Snack khas Solo gurih dan renyah untuk oleh-oleh keluarga.',
            'price' => 32500,
            'weight' => '200 gram',
            'stock' => 24,
            'is_featured' => '1',
            'image_url' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=800&q=80',
        ]);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'name' => 'Abon Gulung Solo',
            'category' => 'Kue Kering',
            'stock' => 24,
        ]);
    }

    public function test_product_can_be_updated_and_deleted(): void
    {
        $product = Product::factory()->create();

        $updateResponse = $this->put(route('products.update', $product), [
            'name' => 'Intip Mini Premium',
            'slug' => $product->slug,
            'category' => 'Snack Tradisional',
            'description' => 'Intip renyah dengan varian rasa modern dan kemasan eksklusif.',
            'price' => 45000,
            'weight' => '250 gram',
            'stock' => 10,
            'is_featured' => '0',
            'image_url' => 'https://images.unsplash.com/photo-1515003197210-e0cd71810b5f?auto=format&fit=crop&w=800&q=80',
        ]);

        $updateResponse->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Intip Mini Premium',
        ]);

        $deleteResponse = $this->delete(route('products.destroy', $product));

        $deleteResponse->assertRedirect(route('products.index'));
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
