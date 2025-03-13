<?php
require 'koneksi.php';

// Handler untuk Web
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_tugas = trim($_POST["nama_tugas"]);
    $deskripsi_tugas = trim($_POST["deskripsi_tugas"]);
    $deadline = $_POST["deadline"];
    $prioritas = $_POST["prioritas"];
    $kategori = $_POST["kategori"];

    if (empty($nama_tugas) || empty($deskripsi_tugas) || empty($deadline) || empty($prioritas) || empty($kategori)) {
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <link rel='stylesheet' href='../assets/css/style.css' />
            <link rel='preconnect' href='https://fonts.googleapis.com' />
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
            <link href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet' />
        </head>
        <body>
            <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Semua kolom wajib diisi!',
                icon: 'error',
                allowOutsideClick: false,
            }).then(() => {
                window.history.back(); // Redirect setelah tombol OK ditekan
            });
            </script>
        </body>
        </html>";
        exit();
    }

    $query = "INSERT INTO tugas (nama_tugas, deskripsi_tugas, deadline, prioritas, kategori) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $nama_tugas, $deskripsi_tugas, $deadline, $prioritas, $kategori);

    if ($stmt->execute()) {
        echo "<!DOCTYPE html>
        <html lang='id'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <link rel='stylesheet' href='../assets/css/style.css' />
            <link rel='preconnect' href='https://fonts.googleapis.com' />
            <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
            <link href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' rel='stylesheet' />
        </head>
        <body>
            <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Tugas berhasil ditambahkan!',
                icon: 'success',
                allowOutsideClick: false
            }).then(() => {
                window.location = '../index.php'; // Redirect setelah tombol OK ditekan
            });
            </script>
        </body>
        </html>";
        exit();
    } else {
        echo "<script>
        Swal.fire('Error!', 'Gagal menambahkan tugas!', 'error');
        </script>";
    }
}

// Handler untuk Postman
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (empty($data)) {
        header("Content-Type: application/json");
        echo json_encode(["status" => "error", "message" => "Data tidak valid"]);
        exit();
    }

    $nama_tugas = trim($data['nama_tugas']);
    $deskripsi_tugas = trim($data['deskripsi_tugas']);
    $deadline = $data['deadline'];
    $prioritas = $data['prioritas'];
    $kategori = $data['kategori'];

    // Validasi data
    if (empty($nama_tugas) || empty($deskripsi_tugas) || empty($deadline) || empty($prioritas) || empty($kategori)) {
        header("Content-Type: application/json");
        echo json_encode(["status" => "error", "message" => "Semua kolom wajib diisi"]);
        exit();
    }

    $query = "INSERT INTO tugas (nama_tugas, deskripsi_tugas, deadline, prioritas, kategori) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $nama_tugas, $deskripsi_tugas, $deadline, $prioritas, $kategori);

    if ($stmt->execute()) {
        header("Content-Type: application/json");
        echo json_encode(["status" => "success", "message" => "Tugas berhasil ditambahkan!"]);
        exit();
    } else {
        header("Content-Type: application/json");
        echo json_encode(["status" => "error", "message" => "Gagal menambahkan tugas!"]);
        exit();
    }
}

// Handler untuk metode request tidak valid
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Content-Type: application/json");
    echo json_encode(["status" => "error", "message" => "Metode request tidak valid!"]);
    exit();
}
?>