@extends('layouts.app', ['title' => 'Rati Salsabila Snack | Oleh-oleh Solo'])

@section('content')
    <section class="hero">
        <div>
            <div style="margin-bottom: 24px; padding: 18px; border-radius: 26px; background: linear-gradient(180deg, rgba(255,255,255,0.10), rgba(255,255,255,0.04)); border: 1px solid rgba(255,255,255,0.10); display: inline-flex;">
                <img src="{{ asset('images/brand/salsa-logo.png') }}" alt="Logo Rati Salsabila Snack" style="width: min(100%, 360px); border-radius: 50%; box-shadow: 0 18px 44px rgba(0,0,0,0.28); background: #fff8ef;">
            </div>
            <span class="hero-badge">Camilan Khas Solo</span>
            <h1 style="margin-top: 10px;">Oleh-oleh Solo yang dikemas cantik, praktis dibawa, dan cocok untuk hadiah.</h1>
            <p class="lead">
                Rati Salsabila Snack menghadirkan pilihan snack dan kue kering khas Solo untuk wisatawan, keluarga, kantor, dan reseller.
                Setiap produk dipilih untuk memberi kesan hangat, rapi, dan siap menjadi buah tangan yang berkesan.
            </p>
            <div class="actions" style="margin-top: 20px;">
                <a class="pill primary" href="{{ route('catalog.index') }}">Belanja dari Katalog</a>
                <a class="pill secondary" href="{{ route('transactions.create') }}">Buat Pesanan</a>
                <a class="pill" href="https://maps.app.goo.gl/THpUeuZcm1qE5PL96" target="_blank" rel="noreferrer">Buka Lokasi Maps</a>
            </div>
            <div class="metrics">
                <div class="metric">
                    <strong>{{ $productCount }}</strong>
                    <span class="muted">Pilihan oleh-oleh siap pesan</span>
                </div>
                <div class="metric">
                    <strong>Pickup & Delivery</strong>
                    <span class="muted">Fleksibel untuk ambil langsung atau kirim</span>
                </div>
                <div class="metric">
                    <strong>Transaksi</strong>
                    <span class="muted">Pemesanan tercatat rapi dan mudah dilacak</span>
                </div>
            </div>
        </div>
        <aside class="hero-card">
            <p style="margin-top: 0; letter-spacing: 0.12em; text-transform: uppercase;">Pilihan Favorit</p>
            <h2 style="font-size: 2rem; margin-bottom: 16px;">Rati Salsabila Snack</h2>
            <p style="line-height: 1.8;">
                Nikmati snack tradisional dan kue kering khas Solo dalam kemasan yang siap untuk perjalanan, kunjungan keluarga, atau hampers kantor.
            </p>
            <div class="badge-row" style="margin-top: 20px;">
                <span class="mini-badge">Kemasan rapi</span>
                <span class="mini-badge">Rasa khas Solo</span>
                <span class="mini-badge">Siap kirim</span>
            </div>
        </aside>
    </section>

    <section class="section">
        <div class="section-title">
            <div>
                <h2>Produk Unggulan</h2>
                <p>Kurasi produk favorit pelanggan untuk oleh-oleh praktis, suguhan tamu, atau pesanan hampers.</p>
            </div>
            <a class="pill" href="{{ route('catalog.index') }}">Lihat Semua Katalog</a>
        </div>
        <div class="grid cards">
            @forelse ($featuredProducts as $product)
                <article class="card">
                    <img class="thumb" src="{{ ($product->image_url && str_starts_with($product->image_url, 'http')) ? $product->image_url : asset(ltrim($product->image_url ?: 'images/hero/storefront-snack.svg', '/')) }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <span class="tag">{{ $product->category }}</span>
                        <h3 style="margin-top: 12px;">{{ $product->name }}</h3>
                        <p class="muted" style="line-height: 1.7;">{{ $product->description }}</p>
                        <div class="actions" style="justify-content: space-between; align-items: center;">
                            <span class="price">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</span>
                            <a class="pill" href="{{ route('transactions.create', ['product' => $product->id]) }}">Pesan</a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="panel">
                    <p class="muted">Produk unggulan akan tampil di sini setelah katalog diisi.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="section">
        <div class="split-grid">
            <div class="panel soft">
                <div class="section-title" style="margin-bottom: 12px;">
                    <div>
                        <h2>Cara Pemesanan</h2>
                        <p>Alur sederhana yang memudahkan pelanggan melakukan transaksi.</p>
                    </div>
                </div>
                <ol class="list-clean">
                    <li><strong>Pilih produk</strong><br><span class="muted">Buka katalog dan tentukan snack favorit yang ingin dibeli.</span></li>
                    <li><strong>Isi data transaksi</strong><br><span class="muted">Lengkapi nama, nomor WhatsApp, alamat, dan metode pembayaran.</span></li>
                    <li><strong>Tunggu konfirmasi</strong><br><span class="muted">Tim Rati Salsabila Snack akan menghubungi untuk memastikan pesanan dan pengiriman.</span></li>
                </ol>
            </div>
            <div class="panel">
                <div class="section-title" style="margin-bottom: 12px;">
                    <div>
                        <h2>Transaksi Terbaru</h2>
                        <p>Contoh pesanan yang sedang masuk ke sistem toko.</p>
                    </div>
                </div>
                <ul class="list-clean">
                    @foreach ($recentTransactions as $transaction)
                        <li>
                            <strong>{{ $transaction->invoice_number }}</strong><br>
                            <span class="muted">{{ $transaction->customer_name }} • {{ ucfirst($transaction->order_status) }} • Rp {{ number_format((float) $transaction->total_amount, 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
