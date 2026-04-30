<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\ProductService;
use App\Services\TransactionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class TransactionController extends Controller
{
    public function __construct(
        private readonly ProductService $productService,
        private readonly TransactionService $transactionService,
    ) {}

    public function index(): View
    {
        return view('transactions.index', [
            'transactions' => $this->transactionService->latestTransactions(),
        ]);
    }

    public function create(): View
    {
        return view('transactions.create', [
            'products' => $this->productService->paginatedProducts(50),
            'selectedProductId' => request()->integer('product'),
        ]);
    }

    public function store(TransactionRequest $request): RedirectResponse
    {
        $transaction = $this->transactionService->create($request->payload());

        return redirect()
            ->route('transactions.show', $transaction)
            ->with('status', 'Pesanan berhasil dibuat. Tim kami akan segera menghubungi Anda untuk konfirmasi.');
    }

    public function show(Transaction $transaction): View
    {
        $transaction->load('items.product');

        return view('transactions.show', [
            'transaction' => $transaction,
        ]);
    }
}
