@php
    $product ??= null;
@endphp

<div class="form-grid">
    <div class="form-group">
        <label for="name">Nama produk</label>
        <input id="name" name="name" type="text" value="{{ old('name', $product->name ?? '') }}" required>
    </div>
    <div class="form-group">
        <label for="category">Kategori</label>
        <input id="category" name="category" type="text" value="{{ old('category', $product->category ?? '') }}" required>
    </div>
    <div class="form-group full">
        <label for="description">Deskripsi</label>
        <textarea id="description" name="description" required>{{ old('description', $product->description ?? '') }}</textarea>
    </div>
    <div class="form-group">
        <label for="price">Harga</label>
        <input id="price" name="price" type="number" min="0" step="1000" value="{{ old('price', $product->price ?? '') }}" required>
    </div>
    <div class="form-group">
        <label for="weight">Berat</label>
        <input id="weight" name="weight" type="text" value="{{ old('weight', $product->weight ?? '') }}" required>
    </div>
    <div class="form-group">
        <label for="stock">Stok</label>
        <input id="stock" name="stock" type="number" min="0" value="{{ old('stock', $product->stock ?? 0) }}" required>
    </div>
    <div class="form-group">
        <label for="image_url">Path atau URL gambar</label>
        <input id="image_url" name="image_url" type="text" value="{{ old('image_url', $product->image_url ?? '') }}" placeholder="/images/products/nama-file.svg">
    </div>
    <div class="form-group full">
        <label class="pill" style="justify-content: flex-start; gap: 10px;">
            <input name="is_featured" type="checkbox" value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }} style="width: auto;">
            Tampilkan sebagai produk unggulan di beranda
        </label>
    </div>
</div>
