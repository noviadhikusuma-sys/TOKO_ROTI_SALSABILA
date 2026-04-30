@extends('layouts.app', ['title' => 'Edit Produk | Ratisabilla Snack'])

@section('content')
    <section class="section">
        <div class="section-title">
            <div>
                <h1 style="font-size: clamp(2rem, 3vw, 3.2rem);">Edit Produk</h1>
                <p>Perbarui informasi produk agar katalog tetap relevan dan menarik.</p>
            </div>
        </div>
        <div class="panel">
            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')
                @include('products._form', ['product' => $product])
                <div class="actions" style="margin-top: 18px;">
                    <button class="pill primary" type="submit">Update Produk</button>
                    <a class="pill" href="{{ route('products.index') }}">Kembali</a>
                </div>
            </form>
        </div>
    </section>
@endsection
