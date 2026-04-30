<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Services\TransactionService;
use Illuminate\Contracts\View\View;

final class HomeController extends Controller
{
    public function __construct(
        private readonly ProductService $productService,
        private readonly TransactionService $transactionService,
    ) {}

    public function index(): View
    {
        return view('home', [
            'featuredProducts' => $this->productService->featuredProducts(),
            'productCount' => $this->productService->totalProducts(),
            'recentTransactions' => $this->transactionService->latestTransactions(3),
        ]);
    }
}
