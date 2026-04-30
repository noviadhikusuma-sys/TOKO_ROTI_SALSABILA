@extends('layouts.app', ['title' => 'Katalog Produk | Rati Salsabila Snack'])

@section('content')
    <section class="section">
        <div class="section-title">
            <div>
                <span class="hero-badge">Katalog</span>
                <h1 style="font-size: clamp(2.1rem, 3.2vw, 3.6rem); margin-top: 10px;">Pilihan oleh-oleh Solo untuk keluarga, tamu, dan hampers.</h1>
                <p>Temukan camilan khas Solo dengan kemasan yang rapi dan siap dipesan langsung dari website.</p>
            </div>
            <a class="pill primary" href="{{ route('transactions.create') }}">Buat Transaksi</a>
        </div>

        <div class="grid cards">
            @foreach ($products as $product)
                <article class="card">
                    <img class="thumb" src="{{ ($product->image_url && str_starts_with($product->image_url, 'http')) ? $product->image_url : asset(ltrim($product->image_url ?: 'images/hero/storefront-snack.svg', '/')) }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <div class="actions" style="justify-content: space-between; align-items: start;">
                            <span class="tag">{{ $product->category }}</span>
                            <span class="muted">Stok {{ $product->stock }}</span>
                        </div>
                        <h3 style="margin-top: 12px;">{{ $product->name }}</h3>
                        <p class="muted" style="line-height: 1.7;">{{ $product->description }}</p>
                        <div class="summary-box" style="margin: 14px 0;">
                            <strong class="price">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</strong>
                            <div class="muted">{{ $product->weight }}</div>
                        </div>
                        <div class="actions">
                            <a class="pill primary" href="{{ route('transactions.create', ['product' => $product->id]) }}">Pesan Produk Ini</a>
                            <a class="pill" href="{{ route('products.show', $product) }}">Detail Produk</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div style="margin-top: 20px;">{{ $products->links() }}</div>
    </section>
@endsection
