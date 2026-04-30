@extends('layouts.app', ['title' => 'Buat Transaksi | Ratisabilla Snack'])

@section('content')
    <section class="section">
        <div class="section-title">
            <div>
                <span class="hero-badge">Transaksi</span>
                <h1 style="font-size: clamp(2rem, 3vw, 3.4rem); margin-top: 10px;">Form pemesanan cepat untuk pelanggan.</h1>
                <p>Isi data di bawah untuk membuat pesanan. Tim kami akan melakukan konfirmasi setelah transaksi masuk.</p>
            </div>
        </div>

        <div class="split-grid">
            <div class="panel">
                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group full">
                            <label for="product_id">Pilih produk</label>
                            <select id="product_id" name="product_id" required>
                                <option value="">Pilih produk</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ (int) old('product_id', $selectedProductId) === $product->id ? 'selected' : '' }}>
                                        {{ $product->name }} - Rp {{ number_format((float) $product->price, 0, ',', '.') }} (stok {{ $product->stock }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah</label>
                            <input id="quantity" name="quantity" type="number" min="1" value="{{ old('quantity', 1) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Metode pembayaran</label>
                            <select id="payment_method" name="payment_method" required>
                                <option value="transfer_bank" {{ old('payment_method') === 'transfer_bank' ? 'selected' : '' }}>Transfer Bank</option>
                                <option value="qris" {{ old('payment_method') === 'qris' ? 'selected' : '' }}>QRIS</option>
                                <option value="cod" {{ old('payment_method') === 'cod' ? 'selected' : '' }}>COD</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="customer_name">Nama pelanggan</label>
                            <input id="customer_name" name="customer_name" type="text" value="{{ old('customer_name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="customer_phone">Nomor WhatsApp</label>
                            <input id="customer_phone" name="customer_phone" type="text" value="{{ old('customer_phone') }}" required>
                        </div>
                        <div class="form-group full">
                            <label for="customer_email">Email</label>
                            <input id="customer_email" name="customer_email" type="email" value="{{ old('customer_email') }}">
                        </div>
                        <div class="form-group full">
                            <label for="delivery_method">Metode penerimaan</label>
                            <select id="delivery_method" name="delivery_method" required>
                                <option value="pickup" {{ old('delivery_method') === 'pickup' ? 'selected' : '' }}>Ambil di toko</option>
                                <option value="delivery" {{ old('delivery_method') === 'delivery' ? 'selected' : '' }}>Kirim ke alamat</option>
                            </select>
                        </div>
                        <div class="form-group full">
                            <label for="address">Alamat / catatan pengambilan</label>
                            <textarea id="address" name="address" required>{{ old('address') }}</textarea>
                        </div>
                        <div class="form-group full">
                            <label for="note">Catatan tambahan</label>
                            <textarea id="note" name="note">{{ old('note') }}</textarea>
                        </div>
                    </div>
                    <div class="actions" style="margin-top: 18px;">
                        <button class="pill primary" type="submit">Kirim Pesanan</button>
                        <a class="pill" href="{{ route('catalog.index') }}">Kembali ke Katalog</a>
                    </div>
                </form>
            </div>

            <aside class="panel soft">
                <h2 style="margin-bottom: 16px;">Ringkasan Layanan</h2>
                <ul class="list-clean">
                    <li><strong>Konfirmasi cepat</strong><br><span class="muted">Admin akan menghubungi pelanggan setelah transaksi masuk.</span></li>
                    <li><strong>Pengiriman fleksibel</strong><br><span class="muted">Tersedia opsi pickup toko atau delivery lokal.</span></li>
                    <li><strong>Cocok untuk hampers</strong><br><span class="muted">Tambahkan catatan jika pesanan perlu kemasan khusus.</span></li>
                </ul>
            </aside>
        </div>
    </section>
@endsection
