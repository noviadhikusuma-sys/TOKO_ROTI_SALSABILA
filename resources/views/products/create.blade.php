@extends('layouts.app', ['title' => 'Tambah Produk | Ratisabilla Snack'])

@section('content')
    <section class="section">
        <div class="section-title">
            <div>
                <h1 style="font-size: clamp(2rem, 3vw, 3.2rem);">Tambah Produk</h1>
                <p>Gunakan form ini untuk menambahkan item snack baru ke katalog online.</p>
            </div>
        </div>
        <div class="panel">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                @include('products._form')
                <div class="actions" style="margin-top: 18px;">
                    <button class="pill primary" type="submit">Simpan Produk</button>
                    <a class="pill" href="{{ route('products.index') }}">Kembali</a>
                </div>
            </form>
        </div>
    </section>
@endsection
