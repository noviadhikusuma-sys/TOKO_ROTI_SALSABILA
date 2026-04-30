# Laporan Proyek Individu

## Judul

Perancangan dan Implementasi Website Profil Usaha dan Katalog Produk Ratisabilla Snack Menggunakan Laravel

## Identitas Mahasiswa

- Nama:
- NIM:
- Kelas:
- Mata Kuliah:
- Dosen Pengampu:

## BAB 1 Pendahuluan

### 1.1 Latar Belakang

Perkembangan teknologi mendorong pelaku usaha untuk memiliki media digital sebagai sarana promosi dan pelayanan pelanggan. Ratisabilla Snack merupakan usaha oleh-oleh khas Solo yang belum memiliki website, sehingga informasi produk masih disampaikan secara manual. Kondisi ini membuat jangkauan promosi menjadi terbatas dan pengelolaan data produk belum terorganisasi dengan baik.

Berdasarkan kondisi tersebut, dibuatlah website profil usaha dan katalog produk menggunakan framework Laravel. Website ini diharapkan dapat membantu usaha dalam menampilkan informasi produk, memperkenalkan identitas usaha, serta menyediakan fitur pengelolaan data produk secara digital.

### 1.2 Rumusan Masalah

- Bagaimana membuat website untuk usaha yang belum memiliki media promosi berbasis web?
- Bagaimana menerapkan framework Laravel dalam pembangunan website usaha?
- Bagaimana menyediakan minimal satu fitur CRUD dalam website?

### 1.3 Tujuan

- Membuat website profil usaha untuk Ratisabilla Snack.
- Menampilkan katalog produk secara online.
- Mengimplementasikan fitur CRUD pada data produk.
- Menyusun proyek yang siap dipresentasikan dan diunggah ke GitHub.

### 1.4 Manfaat

- Membantu promosi digital usaha.
- Memudahkan pengelolaan data produk.
- Menjadi media pembelajaran implementasi framework Laravel.

## BAB 2 Analisis Kebutuhan

### 2.1 Profil Singkat Usaha

Ratisabilla Snack adalah usaha yang bergerak di bidang penjualan oleh-oleh dan camilan khas Solo. Produk yang ditawarkan meliputi berbagai snack tradisional dan kue kering yang cocok dijadikan buah tangan.

### 2.2 Kebutuhan Fungsional

- Sistem menampilkan profil singkat usaha.
- Sistem menampilkan katalog produk.
- Sistem menyediakan fitur tambah produk.
- Sistem menyediakan fitur lihat detail produk.
- Sistem menyediakan fitur ubah produk.
- Sistem menyediakan fitur hapus produk.
- Sistem menyediakan form transaksi sederhana.

### 2.3 Kebutuhan Nonfungsional

- Sistem dibangun menggunakan Laravel.
- Tampilan dapat digunakan pada desktop dan mobile.
- Data tersimpan dalam database SQLite.
- Struktur proyek mudah dijalankan untuk demo dan presentasi.

## BAB 3 Perancangan Sistem

### 3.1 Framework dan Teknologi

- Framework: Laravel 12
- Bahasa: PHP
- Database: SQLite
- Frontend: Blade template, CSS, dan Vite
- Pengujian: PHPUnit / Laravel Test

### 3.2 Fitur Sistem

- Beranda usaha
- Katalog produk
- CRUD produk
- Form transaksi
- Halaman daftar transaksi
- API produk sederhana

### 3.3 PRD

Dokumen PRD proyek tersedia pada file [PRD.md](PRD.md).

## BAB 4 Implementasi

### 4.1 Halaman yang Dibuat

- Halaman beranda
- Halaman katalog
- Halaman daftar produk
- Halaman tambah produk
- Halaman edit produk
- Halaman detail produk
- Halaman daftar transaksi
- Halaman form transaksi

### 4.2 Implementasi CRUD

Fitur CRUD diterapkan pada modul produk, dengan rincian:

- Create: menambahkan produk baru
- Read: menampilkan daftar dan detail produk
- Update: mengubah data produk
- Delete: menghapus produk

### 4.3 Screenshot Tampilan

Masukkan screenshot berikut ke bagian ini:

1. Screenshot halaman beranda
2. Screenshot halaman katalog
3. Screenshot halaman daftar produk
4. Screenshot form tambah produk
5. Screenshot halaman transaksi

Template penulisan:

![Screenshot Beranda](screenshots/beranda.png)

Keterangan: Halaman beranda menampilkan profil usaha, produk unggulan, dan akses cepat ke katalog serta transaksi.

## BAB 5 Pengujian

Pengujian dilakukan menggunakan fitur test bawaan Laravel. Skenario yang diuji meliputi:

- API produk mengembalikan data JSON
- Produk dapat ditambahkan melalui form CRUD
- Produk dapat diubah dan dihapus
- Transaksi dapat dibuat
- Stok produk berkurang setelah transaksi berhasil

Hasil pengujian:

- Total test: 6
- Hasil: seluruh test berhasil

## BAB 6 Penutup

### 6.1 Kesimpulan

Website Ratisabilla Snack berhasil dibuat menggunakan framework Laravel sebagai solusi digital untuk usaha yang belum memiliki website. Sistem ini telah memenuhi kebutuhan dasar berupa profil usaha, katalog produk, fitur CRUD produk, dan form transaksi sederhana. Dengan demikian, proyek ini telah memenuhi tujuan tugas proyek individu.

### 6.2 Saran

- Menambahkan login admin
- Menambahkan upload gambar produk
- Menambahkan dashboard laporan transaksi
- Menyediakan hosting online agar dapat diakses publik

## Lampiran

### Link GitHub

https://github.com/Noviadhi/Toko-Roti-Salsabila

### Catatan Export PDF

Laporan ini dapat dibuka di editor Markdown lalu diexport atau dicetak menjadi PDF setelah screenshot dimasukkan.
