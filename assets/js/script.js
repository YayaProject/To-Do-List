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

// Fungsi untuk menyimpan nama pengguna
function saveUsername() {
  const namaPengguna = document.querySelector("#user").value;
  if (namaPengguna) {
    localStorage.setItem("username", namaPengguna); // Simpan ke localStorage
    document.querySelector("#new-user").textContent = namaPengguna; // Tampilkan nama
    document.querySelector(".welcome-popup").style.display = "none"; // Sembunyikan popup
    document.querySelector(".overlay-blur").style.display = "none"; // Sembunyikan overlay
  }
}

// Fungsi untuk memeriksa apakah nama pengguna sudah ada
function checkUsername() {
  const storedUsername = localStorage.getItem("username");
  if (storedUsername) {
    // Jika nama pengguna sudah ada, tampilkan dan sembunyikan popup
    document.querySelector("#new-user").textContent = storedUsername;
    document.querySelector(".welcome-popup").style.display = "none";
    document.querySelector(".overlay-blur").style.display = "none";
  } else {
    // Jika nama pengguna belum ada, tampilkan popup
    document.querySelector(".welcome-popup").style.display = "block";
    document.querySelector(".overlay-blur").style.display = "block";
  }
}

// Event listener untuk tombol submit
document
  .querySelector("#submit-user")
  .addEventListener("click", function (event) {
    event.preventDefault();
    saveUsername();
  });

// Jalankan fungsi checkUsername saat halaman dimuat
window.addEventListener("load", function () {
  checkUsername();
});
