@extends('layouts.app', ['title' => 'Dashboard Produk | Rati Salsabila Snack'])

@section('content')
    <section class="section">
        <div class="section-title">
            <div>
                <h1 style="font-size: clamp(2rem, 3vw, 3.2rem);">Dashboard Produk</h1>
                <p>Kelola katalog, stok, dan detail produk yang tampil pada website toko.</p>
            </div>
            <a class="pill primary" href="{{ route('products.create') }}">Tambah Produk Baru</a>
        </div>

        <div class="panel" style="padding: 0;">
            <table>
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>
                                <strong>{{ $product->name }}</strong><br>
                                <span class="muted">{{ $product->weight }}</span>
                            </td>
                            <td>{{ $product->category }}</td>
                            <td>Rp {{ number_format((float) $product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <div class="actions">
                                    <a class="pill" href="{{ route('products.show', $product) }}">Detail</a>
                                    <a class="pill" href="{{ route('products.edit', $product) }}">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="pill" type="submit" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="muted">Belum ada produk. Tambahkan produk pertama untuk mengisi katalog.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="margin-top: 18px;">{{ $products->links() }}</div>
    </section>
@endsection
