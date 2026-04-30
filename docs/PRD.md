# Product Requirement Document

## Judul Proyek
Website Profil Usaha dan Katalog Produk untuk Oleh-oleh Solo Rati Salsabila Snack

## Latar Belakang
Rati Salsabila Snack adalah usaha oleh-oleh Solo yang belum memiliki website. Saat ini promosi dan informasi produk masih bergantung pada komunikasi manual. Website dibutuhkan untuk memperkuat identitas usaha, menampilkan katalog produk, dan mendukung pengelolaan data produk secara digital.

## Tujuan
1. Menyediakan website profil usaha yang menarik dan mudah dipahami.
2. Menampilkan katalog produk oleh-oleh Solo secara online.
3. Menyediakan fitur CRUD minimal satu modul, yaitu data produk.
4. Menjadi bukti implementasi framework Laravel untuk tugas proyek individu.

## Target Pengguna
1. Calon pembeli yang mencari oleh-oleh khas Solo.
2. Pemilik usaha yang ingin mengelola katalog produk.
3. Dosen atau penguji yang menilai hasil implementasi proyek.

## Ruang Lingkup
1. Halaman beranda yang memperkenalkan usaha dan produk unggulan.
2. Halaman CRUD produk: tambah, lihat, ubah, hapus.
3. Endpoint JSON sederhana untuk katalog produk.
4. Penyimpanan data menggunakan SQLite untuk mempermudah demo lokal.

## Kebutuhan Fungsional
1. Sistem menampilkan profil singkat usaha.
2. Sistem menampilkan daftar produk unggulan pada beranda.
3. Sistem menampilkan tabel data produk.
4. Sistem dapat menambahkan produk baru.
5. Sistem dapat mengubah data produk.
6. Sistem dapat menghapus data produk.
7. Sistem dapat menampilkan detail satu produk.

## Kebutuhan Nonfungsional
1. Dibangun dengan Laravel 12 dan PHP 8.2.
2. Antarmuka responsif untuk desktop dan mobile.
3. Struktur kode rapi, tervalidasi, dan mudah dipresentasikan.
4. Database ringan dan mudah dijalankan di lingkungan lokal.

## Struktur Data Produk
1. Nama produk
2. Slug
3. Kategori
4. Deskripsi
5. Harga
6. Berat
7. Stok
8. Status unggulan
9. URL gambar

## Tolok Ukur Keberhasilan
1. Website dapat dibuka di browser lokal.
2. Semua alur CRUD produk berjalan tanpa error.
3. Data produk tampil pada halaman beranda dan halaman manajemen.
4. Proyek siap diunggah ke GitHub beserta screenshot tampilan.
