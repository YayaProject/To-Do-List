# To-Do List Web Application

## Deskripsi
Aplikasi To-Do List berbasis web ini memungkinkan pengguna untuk menambahkan, mengedit, menyelesaikan, dan menghapus tugas. Aplikasi ini dibuat menggunakan PHP dan MySQL sebagai backend, serta HTML, CSS, dan JavaScript untuk frontend.

Selain antarmuka web, aplikasi ini juga menyediakan CRUD API yang dapat diuji menggunakan Postman untuk mengelola tugas secara programatis.

## Fitur
- **Menambahkan tugas** dengan nama, deskripsi, deadline, kategori, dan prioritas.
- **Mengedit tugas** yang telah ditambahkan.
- **Menandai tugas sebagai selesai** dan memindahkannya ke bagian "Selesai".
- **Menghapus tugas** baik dari daftar tugas aktif maupun selesai.
- **CRUD API** untuk mengelola tugas melalui HTTP request (POST, GET, PUT, DELETE).

## Teknologi yang Digunakan
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP, MySQL
- **API Testing:** Postman
- **Icons:** FontAwesome

## Instalasi dan Penggunaan
1. **Clone Repository**
   ```bash
   git clone https://github.com/YayaProject/To-Do-List.git
   ```
2. **Masuk ke Direktori Proyek**
   ```bash
   cd To-Do-List
   ```
3. **Konfigurasi Database**
   - Buat database baru di MySQL (misal: `todo_list`)
   - Import file `db.sql` yang terdapat dalam repository
   - Sesuaikan file `koneksi.php` dengan konfigurasi database Anda

4. **Menjalankan Aplikasi**
   - Jalankan XAMPP atau server lokal lainnya
   - Akses aplikasi melalui browser dengan URL:
     ```
     http://localhost/todo-list/
     ```

## API Endpoints
Aplikasi ini menyediakan API dengan endpoint sebagai berikut:

- **Mendapatkan semua tugas:**
  ```http
  GET /api/tugas
  ```
- **Mendapatkan tugas berdasarkan ID:**
  ```http
  GET /api/tugas/{id}
  ```
- **Menambahkan tugas baru:**
  ```http
  POST /api/tugas
  ```
  **Body (JSON):**
  ```json
  {
    "nama": "Belajar PHP",
    "deskripsi": "Mempelajari dasar-dasar PHP",
    "deadline": "2025-03-15",
    "kategori": "Pendidikan",
    "prioritas": "Tinggi"
  }
  ```
- **Mengupdate tugas:**
  ```http
  PUT /api/tugas/{id}
  ```
  **Body (JSON):**
  ```json
  {
    "nama": "Belajar PHP Lanjutan",
    "deskripsi": "Mempelajari OOP dalam PHP",
    "deadline": "2025-03-20",
    "kategori": "Pendidikan",
    "prioritas": "Sedang"
  }
  ```
- **Menghapus tugas:**
  ```http
  DELETE /api/tugas/{id}
  ```

## Menguji API dengan Postman
1. Buka **Postman**
2. Gunakan metode **GET, POST, PUT, DELETE** sesuai kebutuhan dengan endpoint yang telah dijelaskan di atas.
3. Pastikan server lokal berjalan sebelum menguji API.

## Kontributor
- **Nur Hidayat**
- **Muhammad Rahyan Noorfauzan**
- **Jumiati**
