<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = intval($_GET['id']);
$cek = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");
if (mysqli_num_rows($cek) == 0) {
    die("Data tidak ditemukan.");
}

if (mysqli_query($koneksi, "DELETE FROM supplier WHERE id='$id'")) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
