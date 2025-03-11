<?php
include 'koneksi.php';

// Pastikan ID tersedia di URL
if (!isset($_GET['id'])) {
    echo "ID tugas tidak ditemukan!";
    exit;
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tugas WHERE id = $id");

if ($result->num_rows == 0) {
    echo "Tugas tidak ditemukan!";
    exit;
}

$tugas = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/tambah-tugas.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit Tugas - To Do List</title>
</head>

<body>
    <header>
        <div class="container">
            <h3>To-Do List <span>/ Edit Tugas</span></h3>
            <a href="../index.php" class="back">
                <i class="fa-solid fa-chevron-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </header>
    <section id="add-form">
        <div class="container">
            <form action="proses-edit.php" method="POST">
                <input type="hidden" name="id" value="<?= $tugas['id']; ?>">
                <label for="nama">Nama Tugas</label>
                <input type="text" id="nama_tugas" name="nama_tugas"
                    value="<?= ($tugas['nama_tugas']); ?>" required>

                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi_tugas" name="deskripsi_tugas"
                    required><?= ($tugas['deskripsi_tugas']); ?></textarea>

                <label for="deadline">Deadline</label>
                <input type="date" id="deadline" name="deadline" value="<?= $tugas['deadline']; ?>" required>

                <label for="prioritas">Prioritas</label>
                <select id="prioritas" name="prioritas">
                    <option value="Tinggi" <?= ($tugas['prioritas'] == 'Tinggi') ? 'selected' : ''; ?>>Tinggi</option>
                    <option value="Sedang" <?= ($tugas['prioritas'] == 'Sedang') ? 'selected' : ''; ?>>Sedang</option>
                    <option value="Rendah" <?= ($tugas['prioritas'] == 'Rendah') ? 'selected' : ''; ?>>Rendah</option>
                </select>

                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori">
                    <option value="Kuliah" <?= ($tugas['prioritas'] == 'Kuliah') ? 'selected' : ''; ?>>Kuliah</option>
                    <option value="Kerja" <?= ($tugas['prioritas'] == 'Kerja') ? 'selected' : ''; ?>>Kerja</option>
                    <option value="Pribadi" <?= ($tugas['prioritas'] == 'Pribadi') ? 'selected' : ''; ?>>Pribadi
                    </option>
                </select>

                <div class="button-group">
                    <button type="reset" class="batal">Batal</button>
                    <button type="submit" class="simpan">Simpan</button>
                </div>
            </form>
        </div>
    </section>
    <footer>
        <p>
            Author: <span class="author">Muhammad Rahyan Noorfauzan</span>,
            <span class="author">Nur Hidayat</span> &
            <span class="author">Jumiati</span>
        </p>
        <p>© To-Do List. 2025</p>
    </footer>
</body>
</html>