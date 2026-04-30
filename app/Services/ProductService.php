<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

final class ProductService
{
    public function paginatedProducts(int $perPage = 8): LengthAwarePaginator
    {
        return Product::query()
            ->latest()
            ->paginate($perPage);
    }

    public function featuredProducts(int $limit = 3): Collection
    {
        return Product::query()
            ->featured()
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function totalProducts(): int
    {
        return Product::query()->count();
    }

    public function lowStockProducts(int $limit = 4): Collection
    {
        return Product::query()
            ->orderBy('stock')
            ->limit($limit)
            ->get();
    }

    /**
     * @param array<string, mixed> $payload
     */
    public function create(array $payload): Product
    {
        $payload['slug'] = $this->generateSlug(
            $payload['slug'] ?? null,
            $payload['name'],
        );

        return Product::query()->create($payload);
    }

    /**
     * @param array<string, mixed> $payload
     */
    public function update(Product $product, array $payload): Product
    {
        $payload['slug'] = $this->generateSlug(
            $payload['slug'] ?? null,
            $payload['name'],
            $product->id,
        );

        $product->update($payload);

        return $product->refresh();
    }

    private function generateSlug(?string $slug, string $name, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: $name);
        $candidate = $baseSlug;
        $counter = 1;

        while ($this->slugExists($candidate, $ignoreId)) {
            $candidate = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $candidate;
    }

    private function slugExists(string $slug, ?int $ignoreId = null): bool
    {
        return Product::query()
            ->when($ignoreId !== null, fn ($query) => $query->whereKeyNot($ignoreId))
            ->where('slug', $slug)
            ->exists();
    }
}
