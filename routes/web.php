<?php

declare(strict_types=1);

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\TransactionController;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/katalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/transaksi', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transaksi/buat', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transaksi', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transaksi/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');
Route::resource('products', ProductController::class);
Route::get('/api/products', function () {
    return ProductResource::collection(
        Product::query()->latest()->get(),
    );
})->name('api.products');
