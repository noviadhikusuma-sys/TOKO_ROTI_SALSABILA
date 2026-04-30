<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class TransactionItem extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'transaction_id',
        'product_id',
        'product_name',
        'product_price',
        'quantity',
        'line_total',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'product_price' => 'decimal:2',
        'quantity' => 'integer',
        'line_total' => 'decimal:2',
    ];

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
