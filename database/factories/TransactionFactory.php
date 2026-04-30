<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_number' => 'RTS-' . now()->format('Ymd') . '-' . fake()->unique()->numerify('####'),
            'customer_name' => fake()->name(),
            'customer_phone' => fake()->phoneNumber(),
            'customer_email' => fake()->safeEmail(),
            'delivery_method' => fake()->randomElement(['pickup', 'delivery']),
            'address' => fake()->address(),
            'note' => fake()->sentence(),
            'subtotal' => fake()->numberBetween(25000, 120000),
            'shipping_cost' => fake()->randomElement([0, 15000]),
            'total_amount' => fake()->numberBetween(25000, 135000),
            'payment_method' => fake()->randomElement(['transfer_bank', 'cod', 'qris']),
            'payment_status' => fake()->randomElement(['pending', 'paid']),
            'order_status' => fake()->randomElement(['baru', 'diproses', 'selesai']),
        ];
    }
}
