# Integrasi Supabase dengan Laravel

Panduan ini menyiapkan Supabase PostgreSQL sebagai database untuk aplikasi Toko Roti Salsabila.

## Yang sudah disiapkan di proyek

- Laravel memakai koneksi `pgsql` dengan `sslmode=require`.
- `pdo_pgsql` dan `pgsql` sudah diaktifkan di PHP Laragon.
- `SupabaseServiceProvider` sudah terdaftar.
- `App\Services\SupabaseService` memakai REST API Supabase lewat HTTP client bawaan Laravel.
- SQL schema tersedia di `database/supabase/toko_roti_salsabila.sql`.

## 1. Buat project Supabase

1. Buka `https://supabase.com/dashboard`.
2. Klik `New project`.
3. Isi nama project, misalnya `toko-roti-salsabila`.
4. Simpan database password karena dipakai untuk koneksi Laravel.
5. Pilih region terdekat, misalnya Singapore.

## 2. Ambil credential

Di dashboard Supabase:

- `Project Settings > API`
  - `Project URL` untuk `SUPABASE_URL`
  - `anon public` untuk `SUPABASE_KEY`
  - `service_role` untuk `SUPABASE_SECRET`
- `Project Settings > Database > Connection string`
  - Gunakan `Session pooler` untuk `DB_URL`
  - Ganti placeholder password dengan database password project

## 3. Isi file `.env`

Contoh format:

```env
DB_CONNECTION=pgsql
DB_URL=postgres://postgres.your-project-ref:your_database_password@aws-0-ap-southeast-1.pooler.supabase.com:5432/postgres
DB_SCHEMA=public
DB_SSLMODE=require

SUPABASE_URL=https://your-project-ref.supabase.co
SUPABASE_KEY=your_supabase_anon_key
SUPABASE_SECRET=your_supabase_service_role_key
SUPABASE_SCHEMA=public
```

Jangan commit `.env` karena berisi credential rahasia.

## 4. Buat tabel di Supabase

Pilihan utama, jalankan migration Laravel:

```bash
C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe artisan migrate --seed
```

Alternatif, buka `SQL Editor` di Supabase lalu jalankan isi file:

```text
database/supabase/toko_roti_salsabila.sql
```

## 5. Cek koneksi

```bash
C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe artisan migrate:status
C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe artisan test
```

Jika memakai Laragon server, restart Laragon setelah mengaktifkan ekstensi PostgreSQL.

## Catatan keamanan

- Gunakan `SUPABASE_SECRET` hanya di server Laravel.
- Jangan taruh service role key di JavaScript atau Blade.
- Aktifkan Row Level Security jika tabel dibuka untuk akses client-side langsung.
- Rotate key Supabase jika credential pernah tersebar.
