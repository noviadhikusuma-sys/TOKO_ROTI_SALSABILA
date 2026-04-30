# Toko Roti Salsabila

Website profil usaha dan katalog produk untuk UMKM oleh-oleh Solo "Rati Salsabila Snack" yang belum memiliki website. Proyek ini dibuat sebagai tugas proyek individu menggunakan framework Laravel.

## Identitas Proyek

- Nama usaha: Rati Salsabila Snack
- Jenis usaha: Oleh-oleh dan camilan khas Solo
- Framework: Laravel 12
- Bahasa pemrograman: PHP 8.2+
- Database: SQLite
- Repository GitHub: https://github.com/Noviadhi/Toko-Roti-Salsabila

## Latar Belakang

Rati Salsabila Snack adalah usaha oleh-oleh Solo yang belum memiliki website. Informasi produk dan pemesanan masih dilakukan secara manual. Website ini dibuat untuk membantu promosi usaha, menampilkan katalog produk, serta mengelola data produk dan transaksi secara lebih rapi.

## Fitur Utama

- Halaman beranda profil usaha
- Halaman katalog produk
- CRUD produk: tambah, lihat, ubah, hapus
- Form transaksi/pemesanan
- Riwayat transaksi
- Endpoint JSON sederhana untuk data produk

## Bukti Pemenuhan Tugas

1. Memilih satu usaha yang belum punya website
   Usaha yang dipilih adalah Rati Salsabila Snack, UMKM oleh-oleh Solo.
2. Membuat PRD
   Dokumen PRD tersedia di [docs/PRD.md](docs/PRD.md).
3. Membuat website dengan framework
   Website dibangun menggunakan Laravel.
4. Minimal terdapat 1 CRUD
   CRUD produk tersedia pada menu manajemen produk.
5. Melampirkan screenshot tampilan
   Tambahkan screenshot ke folder `docs/screenshots/` lalu cantumkan pada laporan PDF.
6. Melampirkan link GitHub
   Link repository: https://github.com/Noviadhi/Toko-Roti-Salsabila

## Struktur Halaman

- `/` : beranda usaha
- `/katalog` : katalog produk
- `/products` : CRUD produk
- `/transaksi/buat` : form pemesanan
- `/transaksi` : daftar transaksi
- `/api/products` : endpoint JSON produk

## Cara Menjalankan Proyek

1. Clone repository:

```bash
git clone https://github.com/Noviadhi/Toko-Roti-Salsabila.git
cd Toko-Roti-Salsabila
```

2. Install dependency:

```bash
composer install
```

3. Salin environment file:

```bash
copy .env.example .env
```

4. Generate application key:

```bash
php artisan key:generate
```

5. Jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

6. Jalankan server:

```bash
php artisan serve
```

7. Buka browser ke alamat:

```text
http://127.0.0.1:8000
```

## Pengujian

Pengujian fitur dilakukan dengan Laravel test dan mencakup:

- API produk
- CRUD produk
- Alur transaksi dan pengurangan stok

Perintah pengujian:

```bash
php artisan test
```

## Dokumen Pendukung

- PRD: [docs/PRD.md](docs/PRD.md)
- Draft laporan: [docs/LAPORAN.md](docs/LAPORAN.md)
- Checklist pengumpulan: [docs/CHECKLIST-PENGUMPULAN.md](docs/CHECKLIST-PENGUMPULAN.md)

## Catatan Pengumpulan

Sebelum dikumpulkan, pastikan:

- Screenshot tampilan sudah dimasukkan ke laporan
- Laporan sudah diexport ke PDF
- Repository GitHub sudah dipush
- Aplikasi dapat dijalankan tanpa error
