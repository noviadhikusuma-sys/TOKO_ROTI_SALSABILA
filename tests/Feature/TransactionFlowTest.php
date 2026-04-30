<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class TransactionFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_transaction_page_can_be_rendered(): void
    {
        Product::factory()->create();

        $response = $this->get(route('transactions.create'));

        $response->assertOk()->assertSee('Form pemesanan cepat');
    }

    public function test_customer_can_create_transaction_and_stock_is_reduced(): void
    {
        $product = Product::factory()->create([
            'name' => 'Abon Gulung Solo',
            'price' => 32000,
            'stock' => 10,
        ]);

        $response = $this->post(route('transactions.store'), [
            'product_id' => $product->id,
            'quantity' => 3,
            'customer_name' => 'Nadia Prameswari',
            'customer_phone' => '081234567899',
            'customer_email' => 'nadia@example.com',
            'delivery_method' => 'delivery',
            'address' => 'Jl. Adi Sucipto No. 10, Solo',
            'note' => 'Mohon kirim besok pagi.',
            'payment_method' => 'transfer_bank',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('transactions', [
            'customer_name' => 'Nadia Prameswari',
            'delivery_method' => 'delivery',
            'total_amount' => 111000,
        ]);

        $this->assertDatabaseHas('transaction_items', [
            'product_id' => $product->id,
            'quantity' => 3,
            'line_total' => 96000,
        ]);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'stock' => 7,
        ]);
    }
}
