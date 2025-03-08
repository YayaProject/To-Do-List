# To-Do List Web Application

## Deskripsi
Aplikasi To-Do List berbasis web ini memungkinkan pengguna untuk menambahkan, mengedit, menyelesaikan, dan menghapus tugas. Aplikasi ini dibuat menggunakan PHP dan MySQL sebagai backend, serta HTML, CSS, dan JavaScript untuk frontend.

## Fitur
- **Menambahkan tugas** dengan nama, deskripsi, deadline, kategori, dan prioritas.
- **Mengedit tugas** yang telah ditambahkan.
- **Menandai tugas sebagai selesai** dan memindahkannya ke bagian "Selesai".
- **Menghapus tugas** baik dari daftar tugas aktif maupun selesai.
- **Pencarian tugas** berdasarkan nama.

## Teknologi yang Digunakan
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP, MySQL
- **Icons:** FontAwesome

## Instalasi dan Penggunaan
1. **Clone Repository**
   ```bash
   git clone https://github.com/username/repository-name.git
   ```
2. **Masuk ke Direktori Proyek**
   ```bash
   cd repository-name
   ```
3. **Konfigurasi Database**
   - Buat database baru di MySQL (misal: `todo_list`)
   - Import file `database.sql` yang terdapat dalam repository
   - Sesuaikan file `koneksi.php` dengan konfigurasi database Anda

4. **Menjalankan Aplikasi**
   - Jalankan XAMPP atau server lokal lainnya
   - Akses aplikasi melalui browser dengan URL:
     ```
     http://localhost/todo-list/
     ```

## Struktur Proyek
```
📁 todo-list/
├── 📂 assets/       # Folder untuk CSS, JS, dan gambar
├── 📂 database/     # Folder untuk file SQL
├── 📂 includes/     # Folder untuk file koneksi dan helper
├── index.php        # Halaman utama
├── tambah-tugas.php # Halaman untuk menambahkan tugas
├── edit-tugas.php   # Halaman untuk mengedit tugas
├── proses-tambah.php  # Proses menambah tugas
├── proses-edit.php    # Proses mengedit tugas
├── proses-selesai.php # Proses menandai tugas selesai
├── proses-hapus.php   # Proses menghapus tugas
├── koneksi.php        # Konfigurasi database
└── README.md       # Dokumentasi proyek
```

## Kontributor
- **Muhammad Rahyan Noorfauzan**
- **Nur Hidayat**
- **Jumiati**

## Lisensi
Proyek ini dilisensikan di bawah [MIT License](LICENSE).

