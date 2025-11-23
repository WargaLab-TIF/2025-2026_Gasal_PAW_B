<?php
include 'koneksi.php';            // Koneksi ke database

$id = intval($_GET['id']);        // Ambil id user dari URL (pastikan integer)

// Hapus data user berdasarkan id
mysqli_query($koneksi, "DELETE FROM user WHERE id_user=$id");

// Setelah hapus, kembali ke halaman daftar user
header('Location: user.php');
exit;
?>
