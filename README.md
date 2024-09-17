# InventarisKu

Website sistem inventaris toko.

## Fitur

### Admin & Pegawai

- [x] Login
- [x] Logout
- [x] Dashboard
- [x] Transaksi keluar - daftar
- [x] Transaksi keluar - tambah
- [x] Transaksi keluar - detail
- [x] Transaksi keluar - hapus
- [x] Transaksi masuk - daftar
- [x] Transaksi masuk - tambah
- [x] Transaksi masuk - detail
- [x] Transaksi masuk - hapus
- [x] Barang - daftar
- [x] Barang - tambah
- [x] Barang - edit
- [x] Barang - hapus
- [x] Log aktivitas
- [x] Profil - edit
- [x] Profil - ubah password

### Admin

- [x] Barang - rekalkulasi
- [x] Laporan - barang terlaris
- [x] Laporan - stok barang
- [x] Laporan - user aktif/tidak aktif
- [x] User - daftar
- [x] User - tambah
- [x] User - edit
- [x] User - hapus
- [x] User - ubah password

## Instalasi

Berikut adalah langkah-langkah untuk instalasi website InventarisKu:

1. Buat sebuah database.
2. Import `schema.sql` ke database yang telah dibuat untuk membuat skema database atau tabel-tabel yang dibutuhkan oleh website ini.
3. Import `data.sql` ke database yang dibuat untuk mengisi data-data sementara ke dalam database.
4. Isi konfigurasi website InventarisKu di file-file yang terletak pada folder `config` (`app.php` dan `db.php`).
5. Akses website melalui web browser. Enjoy!!!

## Struktur File & Folder

- `assets`: Berisi file-file aset (css, js, img, dll).
- `config`: Berisi konfigurasi-konfigurasi untuk website InventarisKu.
- `guards`: Berisi file-file yang memiliki fungsi mirip middleware untuk autentikasi dan otorisasi sebuah halaman.
- `helpers`: Berisi file-file fungsi untuk membantu saat pengembangan website.
- `in`: Berisi file-file untuk pengelolaan tabel `in_h` dan `in_d` (`index.php`: daftar, `add.php`: tambah, dan `details.php`: edit).
- `items`: Berisi file-file untuk pengelolaan tabel `items` (`index.php`: daftar, `add.php`: tambah, `details.php`: edit, dan `recalculation.php`: rekalkulasi).
- `out`: Berisi file-file untuk pengelolaan tabel `out_h` dan `out_d` (`index.php`: daftar, `add.php`: tambah, dan `details.php`: edit).
- `partials`: Berisi potongan-potongan atau komponen tampilan website.
- `profile`: Berisi file-file untuk pengelolaan profil (`index.php`: edit dan `change-password.php`: ubah password)
- `reports`: Berisi file-file untuk laporan (`barang-terlaris/index.php`, `barang-terlaris/print.php`, `stok-barang/index.php`, `stok-barang/print.php`, `user-aktif-tidak-aktif/index.php`, dan `user-aktif-tidak-aktif/print.php`).
- `users`: Berisi file-file untuk pengelolaan tabel `users` (`index.php`: daftar, `add.php`: tambah, dan `details.php`: edit/ubah password).
- `activity-logs.php`
- `index.php`
- `login.php`
- `logout.php`

## Panduan Pengembangan

Pada saat membuat file baru yang berekstensi `.php` pastikan untuk selalu memasukkan file `config/app.php` pada bagian atas kode atau file.

## Pengembang

- Ali
- Shafy
