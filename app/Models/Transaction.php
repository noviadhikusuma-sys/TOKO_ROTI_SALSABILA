<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'invoice_number',
        'customer_name',
        'customer_phone',
        'customer_email',
        'delivery_method',
        'address',
        'note',
        'subtotal',
        'shipping_cost',
        'total_amount',
        'payment_method',
        'payment_status',
        'order_status',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'subtotal' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(TransactionItem::class);
    }
}
