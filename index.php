<?php
include 'backend/koneksi.php';

if (isset($_GET['json'])) {
    $result = $conn->query("SELECT * FROM tugas ORDER BY id ASC");
    $tasks = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tasks[] = [
                'id' => $row['id'],
                'nama_tugas' => $row['nama_tugas'],
                'deskripsi_tugas' => $row['deskripsi_tugas'],
                'deadline' => date("d-m-Y", strtotime($row['deadline'])),
                'kategori' => $row['kategori'],
                'prioritas' => $row['prioritas'],
                'status' => $row['status']
            ];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($tasks);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>To Do List - Kelompok 1</title>
</head>

<body>
    <header>
        <div class="container">
            <h2>To-Do List</h2>
            <div class="menu">
                <div class="add-task">
                    <a href="backend/tambah-tugas.php">
                        <i class="fas fa-plus"></i>
                        <span>Tambah Tugas</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section id="berlangsung">
        <h3>Sedang Berlangsung</h3>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th><i class="fa-regular fa-square-check"></i></th>
                        <th>Nama Tugas</th>
                        <th>Deskripsi</th>
                        <th>Deadline</th>
                        <th>Kategori</th>
                        <th>Prioritas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM tugas WHERE status='berlangsung' ORDER BY deadline ASC");
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr class="data">
                            <td>
                                <a href="backend/selesai-tugas.php?id=<?= $row['id']; ?>" class="btn-done">
                                    <i class="fa-regular fa-square"></i>
                                </a>
                            </td>
                            <td data-label="Nama Tugas"><?= htmlspecialchars($row['nama_tugas']); ?></td>
                            <td data-label="Deskripsi">
                                <?= isset($row['deskripsi_tugas']) ? htmlspecialchars($row['deskripsi_tugas']) : ''; ?></td>
                            <td data-label="Deadline"><?= date("d-m-Y", strtotime($row['deadline'])); ?></td>
                            <td data-label="Kategori"><?= htmlspecialchars($row['kategori']); ?></td>
                            <td data-label="Prioritas">
                                <span class="priority <?= ($row['prioritas'] == 'Tinggi') ? 'high' : 'medium'; ?>">
                                    <?= htmlspecialchars($row['prioritas']); ?>
                                </span>
                            </td>
                            <td data-label="Aksi" class="action-buttons">
                                <a href="backend/edit-tugas.php?id=<?= $row['id']; ?>" class="btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="backend/hapus-tugas.php?id=<?= $row['id']; ?>" class="btn-delete"
                                    onclick="confirmDelete(event, '<?= $row['id']; ?>')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a class="btn-info" onclick="openModal(
                                    <?= $row['id']; ?>, 
                                    '<?= htmlspecialchars($row['nama_tugas']); ?>', 
                                    '<?= htmlspecialchars($row['deskripsi_tugas']); ?>', 
                                    '<?= date("d-m-Y", strtotime($row['deadline'])); ?>', 
                                    '<?= htmlspecialchars($row['kategori']); ?>',
                                    '<?= htmlspecialchars($row['prioritas']); ?>'
                                )">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>

    <section id="selesai">
        <div class="container">
            <h3>Selesai</h3>
            <hr />
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th><i class="fa-regular fa-square-check"></i></th>
                            <th>Nama Tugas</th>
                            <th>Deskripsi</th>
                            <th>Deadline</th>
                            <th>Kategori</th>
                            <th>Prioritas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result_selesai = $conn->query("SELECT * FROM tugas WHERE status='selesai' ORDER BY deadline ASC");
                        while ($row = $result_selesai->fetch_assoc()) { ?>
                            <tr class="data">
                                <td><input type="checkbox" checked disabled /></td>
                                <td data-label="Nama Tugas"><?= htmlspecialchars($row['nama_tugas']); ?></td>
                                <td data-label="Deskripsi">
                                    <?= isset($row['deskripsi_tugas']) ? htmlspecialchars($row['deskripsi_tugas']) : ''; ?>
                                </td>
                                <td data-label="Deadline"><?= date("d-m-Y", strtotime($row['deadline'])); ?></td>
                                <td data-label="Kategori"><?= htmlspecialchars($row['kategori']); ?></td>
                                <td data-label="Prioritas">
                                    <span class="priority <?= ($row['prioritas'] == 'Tinggi') ? 'high' : 'medium'; ?>">
                                        <?= htmlspecialchars($row['prioritas']); ?>
                                    </span>
                                </td>
                                <td data-label="Aksi" class="action-buttons">
                                    <a href="backend/hapus-tugas.php?id=<?= $row['id']; ?>" class="btn-delete"
                                        onclick="confirmDelete(event, '<?= $row['id']; ?>')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a class="btn-info" onclick="openModal(
                                        <?= $row['id']; ?>, 
                                        '<?= htmlspecialchars($row['nama_tugas']); ?>', 
                                        '<?= htmlspecialchars($row['deskripsi_tugas']); ?>', 
                                        '<?= date("d-m-Y", strtotime($row['deadline'])); ?>', 
                                        '<?= htmlspecialchars($row['kategori']); ?>',
                                        '<?= htmlspecialchars($row['prioritas']); ?>'
                                    )">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/script.js"></script>
    </body>
</html>