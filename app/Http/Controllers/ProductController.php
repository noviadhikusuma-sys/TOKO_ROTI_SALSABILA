<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $productService,
    ) {}

    public function index(): View
    {
        return view('products.index', [
            'products' => $this->productService->paginatedProducts(),
        ]);
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $this->productService->create($request->validatedPayload());

        return redirect()
            ->route('products.index')
            ->with('status', 'Produk baru berhasil ditambahkan.');
    }

    public function show(Product $product): View
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product): View
    {
        return view('products.edit', [
            'product' => $product,
        ]);
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $this->productService->update($product, $request->validatedPayload());

        return redirect()
            ->route('products.index')
            ->with('status', 'Data produk berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('status', 'Produk berhasil dihapus dari katalog.');
    }
}
