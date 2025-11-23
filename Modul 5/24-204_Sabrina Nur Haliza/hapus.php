<?php
// Menyertakan file koneksi ke database
include 'koneksi.php';

// Mengecek apakah parameter 'id' dikirim melalui URL (GET)
if (!isset($_GET['id'])) {
    // Jika tidak ada ID di URL, hentikan eksekusi dan tampilkan pesan
    die("ID tidak ditemukan.");
}

// Mengubah nilai 'id' menjadi integer agar lebih aman dari injeksi
$id = intval($_GET['id']);

// Mengecek apakah data dengan ID tersebut ada di tabel supplier
$cek = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");

// Jika tidak ditemukan data dengan ID tersebut
if (mysqli_num_rows($cek) == 0) {
    die("Data tidak ditemukan.");
}

// Menjalankan query untuk menghapus data berdasarkan ID
if (mysqli_query($koneksi, "DELETE FROM supplier WHERE id='$id'")) {
    // Jika berhasil, kembalikan pengguna ke halaman utama
    header("Location: index.php");
    exit;
} else {
    // Jika gagal, tampilkan pesan error dari MySQL
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
