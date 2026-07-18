# 🔗 Integrasi Supabase dengan Laravel

Panduan lengkap mengintegrasikan Supabase sebagai database backend untuk aplikasi Toko Roti Salsabila.

## 📋 Persyaratan

- Laravel 12.0
- PHP 8.2+
- Akun Supabase (gratis di https://supabase.com)

## 🚀 Langkah-Langkah Setup

### 1. Buat Proyek Supabase

1. Kunjungi [Supabase Dashboard](https://app.supabase.com)
2. Klik "New Project"
3. Isi informasi proyek:
   - **Name**: `toko-roti-salsabila`
   - **Password**: Buat password yang kuat (simpan baik-baik)
   - **Region**: Pilih yang terdekat (Asia - Singapore atau Tokyo)
4. Tunggu proyek dibuat (±2 menit)

### 2. Dapatkan Credentials

Setelah proyek dibuat, buka tab **Settings** → **API**:

```
SUPABASE_URL: Lihat di bagian "Project URL"
SUPABASE_KEY: Lihat di bagian "anon public" (gunakan untuk client-side)
SUPABASE_SECRET: Lihat di bagian "service_role" (gunakan untuk server-side)
```

### 3. Install Package

```bash
composer require supabase/supabase-php
```

### 4. Update File Environment

Edit `.env` dan tambahkan:

```env
# Database Configuration
DB_CONNECTION=pgsql
DB_HOST=your-project.supabase.co
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=your_password_here

# Supabase Configuration
SUPABASE_URL=https://your-project.supabase.co
SUPABASE_KEY=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...
SUPABASE_SECRET=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...
```

### 5. Register Service Provider

Edit `config/app.php`, tambahkan di array `'providers'`:

```php
'providers' => [
    // ...
    App\Providers\SupabaseServiceProvider::class,
],
```

### 6. Test Koneksi

```bash
php artisan tinker
```

Di dalam tinker, jalankan:

```php
$supabase = app('App\Services\SupabaseService');
$result = $supabase->getAll('users'); // Sesuaikan dengan nama tabel Anda
dd($result);
```

## 💾 Membuat Tabel di Supabase

### Opsi 1: Melalui Dashboard Supabase

1. Buka Supabase Dashboard
2. Klik "SQL Editor" atau "Table Editor"
3. Klik "New Table"
4. Buat tabel sesuai kebutuhan

### Opsi 2: Menggunakan Migration Laravel

```bash
php artisan make:migration create_products_table
```

Edit file migration, kemudian jalankan:

```bash
php artisan migrate
```

**Catatan**: Supabase PostgreSQL otomatis tersinkronisasi dengan migration Laravel.

## 📝 Contoh Penggunaan

### Create (Insert)

```php
use App\Services\SupabaseService;

$supabase = app(SupabaseService::class);

$data = [
    'name' => 'Roti Tawar',
    'price' => 15000,
    'stock' => 50
];

$result = $supabase->insert('products', $data);
```

### Read (Fetch)

```php
// Ambil semua data
$products = $supabase->getAll('products');

// Ambil berdasarkan ID
$product = $supabase->getById('products', 1);

// Query custom
$result = $supabase->from('products')
    ->select('*')
    ->gte('price', 10000)
    ->execute();
```

### Update

```php
$data = ['price' => 16000];
$supabase->update('products', $data, 'id', 1);
```

### Delete

```php
$supabase->delete('products', 'id', 1);
```

## 🔐 Keamanan

### Best Practices

1. **Jangan pernah commit credentials** ke Git
   - Gunakan `.env` dan tambahkan ke `.gitignore`

2. **Gunakan Row Level Security (RLS)** di Supabase
   - Klik tabel → "Authentication" → Enable RLS

3. **Pisahkan Keys**
   - `SUPABASE_KEY`: Untuk public/client-side
   - `SUPABASE_SECRET`: Untuk server-side only

4. **Rotate Keys Secara Berkala**
   - Settings → API → Regenerate Keys

## 🔗 Dokumentasi Resmi

- [Supabase Documentation](https://supabase.com/docs)
- [Laravel Database Documentation](https://laravel.com/docs/database)
- [Supabase PHP Client](https://github.com/supabase-community/supabase-php)

## ❓ Troubleshooting

### Error: "Connection refused"
- Pastikan IP address sudah di-whitelist di Supabase
- Settings → Database → Connections pooling

### Error: "Invalid API Key"
- Periksa kembali SUPABASE_KEY dan SUPABASE_URL di .env
- Pastikan key belum expired

### PostgreSQL Port 5432 Error
- Supabase menggunakan port 5432 (default PostgreSQL)
- Pastikan firewall tidak memblokir port ini

## 📞 Support

Jika mengalami masalah:
1. Cek [Supabase Status](https://status.supabase.com)
2. Lihat logs di Supabase Dashboard
3. Tanya di [Supabase Community](https://discord.supabase.com)
