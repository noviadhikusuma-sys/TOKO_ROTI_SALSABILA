@extends('layouts.app', ['title' => 'Transaksi Pelanggan | Rati Salsabila Snack'])

@section('content')
    <section class="section">
        <div class="section-title">
            <div>
                <span class="hero-badge">Riwayat Transaksi</span>
                <h1 style="font-size: clamp(2rem, 3vw, 3.4rem); margin-top: 10px;">Pesanan pelanggan yang masuk ke toko.</h1>
                <p>Halaman ini menampilkan transaksi terbaru beserta status pemrosesannya.</p>
            </div>
            <a class="pill primary" href="{{ route('transactions.create') }}">Tambah Transaksi</a>
        </div>

        <div class="panel" style="padding: 0;">
            <table>
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Pelanggan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>
                                <strong>{{ $transaction->invoice_number }}</strong><br>
                                <span class="muted">{{ $transaction->created_at?->format('d M Y H:i') }}</span>
                            </td>
                            <td>
                                <strong>{{ $transaction->customer_name }}</strong><br>
                                <span class="muted">{{ $transaction->customer_phone }}</span>
                            </td>
                            <td>Rp {{ number_format((float) $transaction->total_amount, 0, ',', '.') }}</td>
                            <td>
                                <span class="tag">{{ ucfirst($transaction->order_status) }}</span>
                                <div class="muted" style="margin-top: 6px;">{{ ucfirst($transaction->payment_status) }}</div>
                            </td>
                            <td><a class="pill" href="{{ route('transactions.show', $transaction) }}">Lihat Detail</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="muted">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
