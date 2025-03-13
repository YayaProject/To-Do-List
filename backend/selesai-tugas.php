<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $query = "UPDATE tugas SET status='selesai' WHERE id=$id";
    if ($conn->query($query) === TRUE) {
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
                text: 'Tugas berhasil diselesaikan!',
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
        echo "Error: " . $conn->error;
    }
} else {
    echo "<script>
        Swal.fire('Error!', 'ID tugas tidak ditemukan!', 'error');
        window.location.href='../index.php';
        </script>";
}
