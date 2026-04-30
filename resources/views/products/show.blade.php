@extends('layouts.app', ['title' => $product->name . ' | Ratisabilla Snack'])

@section('content')
    <section class="section">
        <div class="card detail-grid">
            <img class="thumb" style="height: 100%;" src="{{ ($product->image_url && str_starts_with($product->image_url, 'http')) ? $product->image_url : asset(ltrim($product->image_url ?: 'images/hero/storefront-snack.svg', '/')) }}" alt="{{ $product->name }}">
            <div class="card-body" style="padding: 28px;">
                <span class="tag">{{ $product->category }}</span>
                <h1 style="font-size: clamp(2rem, 3vw, 3.3rem); margin-top: 12px;">{{ $product->name }}</h1>
                <p class="lead" style="max-width: none;">{{ $product->description }}</p>
                <div class="grid detail-metrics">
                    <div class="metric">
                        <strong class="price">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</strong>
                        <span class="muted">Harga jual</span>
                    </div>
                    <div class="metric">
                        <strong>{{ $product->weight }}</strong>
                        <span class="muted">Berat kemasan</span>
                    </div>
                    <div class="metric">
                        <strong>{{ $product->stock }}</strong>
                        <span class="muted">Stok tersedia</span>
                    </div>
                </div>
                <div class="actions">
                    <a class="pill primary" href="{{ route('products.edit', $product) }}">Edit Produk</a>
                    <a class="pill secondary" href="{{ route('transactions.create', ['product' => $product->id]) }}">Buat Pesanan</a>
                    <a class="pill" href="{{ route('products.index') }}">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
    </section>
@endsection
