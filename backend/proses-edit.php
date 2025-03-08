<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_tugas = $_POST['nama_tugas'];
    $deskripsi_tugas = $_POST['deskripsi_tugas'];
    $deadline = $_POST['deadline'];
    $kategori = $_POST['kategori'];
    $prioritas = $_POST['prioritas'];

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
    <link
      href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'
      rel='stylesheet'
    />
        </head>
        <body>
            <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Semua Kolom Wajib Diisi',
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

    $sql = "UPDATE tugas SET nama_tugas=?, deskripsi_tugas=?, deadline=?, kategori=?, prioritas=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nama_tugas, $deskripsi_tugas, $deadline, $kategori, $prioritas, $id);

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
    <link
      href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'
      rel='stylesheet'
    />
        </head>
        <body>
            <script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Tugas berhasil diperbarui.',
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
        Swal.fire('Error!', 'Gagal memperbarui tugas.', 'error');
        </script>";
    }
} else {
    echo "<script>
    Swal.fire('Akses Ditolak!', 'Anda tidak memiliki izin.', 'error');
    window.location = '../index.php';
    </script>";
}
?>