function openModal(id, nama, deskripsi, deadline, kategori, prioritas) {
    Swal.fire({
        title: nama,
        html: `
    <p><strong>Deskripsi:</strong> ${deskripsi || "Tidak ada deskripsi."}</p>
    <p><strong>Deadline:</strong> ${deadline}</p>
    <p><strong>Kategori:</strong> ${kategori}</p>
    <p><strong>Prioritas:</strong> ${prioritas}</p>
  `,
        icon: "info",
        confirmButtonText: "Tutup",
        confirmButtonColor: "#3396d9",
    });
}

function confirmDelete(event, id) {
    event.preventDefault();

    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "backend/hapus-tugas.php?id=" + id; 
        }
    });
}
