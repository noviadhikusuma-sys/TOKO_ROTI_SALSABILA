<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

final class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $product = Product::query()->first();

        if (! $product) {
            return;
        }

        $transactions = [
            [
                'invoice_number' => 'RTS-' . now()->format('Ymd') . '-0001',
                'customer_name' => 'Alya Putri',
                'customer_phone' => '081234567890',
                'customer_email' => 'alya@example.com',
                'delivery_method' => 'delivery',
                'address' => 'Jl. Slamet Riyadi No. 88, Solo',
                'note' => 'Mohon dikirim sore hari.',
                'subtotal' => (float) $product->price * 2,
                'shipping_cost' => 15000,
                'total_amount' => ((float) $product->price * 2) + 15000,
                'payment_method' => 'transfer_bank',
                'payment_status' => 'paid',
                'order_status' => 'diproses',
                'quantity' => 2,
            ],
            [
                'invoice_number' => 'RTS-' . now()->format('Ymd') . '-0002',
                'customer_name' => 'Rian Saputra',
                'customer_phone' => '082233445566',
                'customer_email' => 'rian@example.com',
                'delivery_method' => 'pickup',
                'address' => 'Ambil langsung di toko.',
                'note' => 'Tolong siapkan kemasan gift.',
                'subtotal' => (float) $product->price,
                'shipping_cost' => 0,
                'total_amount' => (float) $product->price,
                'payment_method' => 'qris',
                'payment_status' => 'pending',
                'order_status' => 'baru',
                'quantity' => 1,
            ],
        ];

        foreach ($transactions as $entry) {
            $transaction = Transaction::query()->updateOrCreate(
                ['invoice_number' => $entry['invoice_number']],
                collect($entry)->except('quantity')->all(),
            );

            $transaction->items()->updateOrCreate(
                ['product_id' => $product->id],
                [
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'quantity' => $entry['quantity'],
                    'line_total' => (float) $product->price * $entry['quantity'],
                ],
            );
        }
    }
}
