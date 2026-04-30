<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_api_returns_json_data(): void
    {
        Product::factory()->count(2)->create();

        $response = $this->getJson(route('api.products'));

        $response
            ->assertOk()
            ->assertJsonCount(2, 'data');
    }
}
