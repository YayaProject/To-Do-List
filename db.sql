CREATE DATABASE todo_list;
USE todo_list;

CREATE TABLE tugas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_tugas VARCHAR(100) NOT NULL,
    deskripsi_tugas TEXT,
    deadline DATE,
    prioritas ENUM('Tinggi', 'Sedang', 'Rendah') NOT NULL,
    kategori ENUM('Kuliah', 'Kerja', 'Pribadi') NOT NULL
);
