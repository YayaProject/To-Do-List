<?php include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="en">

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
    <title>Tambah Tugas - To Do List</title>
</head>

<body>
    <header>
        <div class="container">
            <h2>To-Do List</h2>
            <a href="../index.php" class="back">
                <i class="fa-solid fa-chevron-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </header>
    <section id="add-form">
        <div class="container">
            <form action="proses-tambah.php" method="POST">
                <label for="nama">Nama Tugas</label>
                <input type="text" id="nama" name="nama_tugas" required>

                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi_tugas" required></textarea>

                <label for="deadline">Deadline</label>
                <input type="date" id="deadline" name="deadline">

                <label for="prioritas">Prioritas</label>
                <select id="prioritas" name="prioritas">
                    <option value="tinggi">Tinggi</option>
                    <option value="sedang">Sedang</option>
                    <option value="rendah">Rendah</option>
                </select>

                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" required>
                    <option value="Kuliah">Kuliah</option>
                    <option value="Kerja">Kerja</option>
                    <option value="Pribadi">Pribadi</option>
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