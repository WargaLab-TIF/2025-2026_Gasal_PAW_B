<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hapus = mysqli_query($conn, "DELETE FROM supplier WHERE id='$id'");

    if ($hapus) {
        echo "<script>alert('Data supplier dan data terkait berhasil dihapus!');
        document.location='tampilkan data.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data supplier!');
        document.location='tampilkan data.php';</script>";
    }
} else {
    echo "<script>alert('ID supplier tidak ditemukan!');
    document.location='tampilkan data.php';</script>";
}
?>
