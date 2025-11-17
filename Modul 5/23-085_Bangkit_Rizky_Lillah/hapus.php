<?php
include 'koneksi.php';
$id = $_GET['id'] ?? 0;

// Cek apakah supplier masih digunakan
$cek = mysqli_query($koneksi, "SELECT COUNT(*) AS jml FROM barang WHERE supplier_id = $id");
$data = mysqli_fetch_assoc($cek);

if ($data['jml'] > 0) {
    echo "<script>
            alert('Tidak dapat menghapus supplier karena masih digunakan di tabel barang!');
            window.location='index.php';
          </script>";
} else {
    mysqli_query($koneksi, "DELETE FROM supplier WHERE id=$id");
    header("Location: index.php");
}
?>
