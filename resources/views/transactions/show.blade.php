@extends('layouts.app', ['title' => 'Detail Transaksi | Ratisabilla Snack'])

@section('content')
    <section class="section">
        <div class="section-title">
            <div>
                <span class="hero-badge">Detail Pesanan</span>
                <h1 style="font-size: clamp(2rem, 3vw, 3.2rem); margin-top: 10px;">{{ $transaction->invoice_number }}</h1>
                <p>Ringkasan transaksi pelanggan dan item pesanan.</p>
            </div>
            <a class="pill" href="{{ route('transactions.index') }}">Kembali ke Transaksi</a>
        </div>

        <div class="split-grid">
            <div class="panel">
                <h2 style="margin-bottom: 16px;">Informasi Pelanggan</h2>
                <div class="summary-box">
                    <p><strong>{{ $transaction->customer_name }}</strong></p>
                    <p class="muted">{{ $transaction->customer_phone }}</p>
                    <p class="muted">{{ $transaction->customer_email ?: 'Email tidak dicantumkan' }}</p>
                    <p class="muted">{{ $transaction->address }}</p>
                    <p class="muted">Metode: {{ $transaction->delivery_method === 'delivery' ? 'Delivery' : 'Pickup' }} • Pembayaran: {{ str_replace('_', ' ', ucfirst($transaction->payment_method)) }}</p>
                </div>

                <h2 style="margin: 24px 0 16px;">Item Pesanan</h2>
                <ul class="list-clean">
                    @foreach ($transaction->items as $item)
                        <li>
                            <strong>{{ $item->product_name }}</strong><br>
                            <span class="muted">{{ $item->quantity }} x Rp {{ number_format((float) $item->product_price, 0, ',', '.') }} = Rp {{ number_format((float) $item->line_total, 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <aside class="panel soft">
                <h2 style="margin-bottom: 16px;">Ringkasan Pembayaran</h2>
                <div class="summary-box">
                    <p><strong>Subtotal</strong><br><span class="price">Rp {{ number_format((float) $transaction->subtotal, 0, ',', '.') }}</span></p>
                    <p><strong>Ongkir</strong><br><span class="muted">Rp {{ number_format((float) $transaction->shipping_cost, 0, ',', '.') }}</span></p>
                    <p><strong>Total</strong><br><span class="price">Rp {{ number_format((float) $transaction->total_amount, 0, ',', '.') }}</span></p>
                    <p class="muted">Status pesanan: {{ ucfirst($transaction->order_status) }}</p>
                    <p class="muted">Status pembayaran: {{ ucfirst($transaction->payment_status) }}</p>
                    @if ($transaction->note)
                        <p class="muted">Catatan: {{ $transaction->note }}</p>
                    @endif
                </div>
            </aside>
        </div>
    </section>
@endsection
