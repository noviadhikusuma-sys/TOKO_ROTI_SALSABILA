<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'category' => $this->category,
            'description' => $this->description,
            'price' => (float) $this->price,
            'price_label' => 'Rp ' . number_format((float) $this->price, 0, ',', '.'),
            'weight' => $this->weight,
            'stock' => $this->stock,
            'is_featured' => $this->is_featured,
            'image_url' => $this->image_url,
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
