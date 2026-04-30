<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

final class TransactionService
{
    public function latestTransactions(int $limit = 8): Collection
    {
        return Transaction::query()
            ->with('items')
            ->latest()
            ->limit($limit)
            ->get();
    }

    /**
     * @param array<string, mixed> $payload
     */
    public function create(array $payload): Transaction
    {
        return DB::transaction(function () use ($payload): Transaction {
            /** @var Product $product */
            $product = Product::query()->lockForUpdate()->findOrFail($payload['product_id']);
            $quantity = (int) $payload['quantity'];

            if ($quantity > $product->stock) {
                throw ValidationException::withMessages([
                    'quantity' => 'Stok produk tidak mencukupi untuk jumlah pesanan tersebut.',
                ]);
            }

            $subtotal = (float) $product->price * $quantity;
            $shippingCost = $payload['delivery_method'] === 'delivery' ? 15000.0 : 0.0;
            $totalAmount = $subtotal + $shippingCost;

            $transaction = Transaction::query()->create([
                'invoice_number' => $this->generateInvoiceNumber(),
                'customer_name' => $payload['customer_name'],
                'customer_phone' => $payload['customer_phone'],
                'customer_email' => $payload['customer_email'] ?? null,
                'delivery_method' => $payload['delivery_method'],
                'address' => $payload['address'],
                'note' => $payload['note'] ?? null,
                'subtotal' => $subtotal,
                'shipping_cost' => $shippingCost,
                'total_amount' => $totalAmount,
                'payment_method' => $payload['payment_method'],
                'payment_status' => 'pending',
                'order_status' => 'baru',
            ]);

            $transaction->items()->create([
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'quantity' => $quantity,
                'line_total' => $subtotal,
            ]);

            $product->decrement('stock', $quantity);

            return $transaction->load('items.product');
        });
    }

    private function generateInvoiceNumber(): string
    {
        $date = now()->format('Ymd');
        $count = Transaction::query()
            ->whereDate('created_at', now()->toDateString())
            ->count() + 1;

        return sprintf('RTS-%s-%04d', $date, $count);
    }
}
