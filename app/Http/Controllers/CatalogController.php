<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Contracts\View\View;

final class CatalogController extends Controller
{
    public function __construct(
        private readonly ProductService $productService,
    ) {}

    public function index(): View
    {
        return view('catalog.index', [
            'products' => $this->productService->paginatedProducts(9),
        ]);
    }
}
