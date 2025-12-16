<?php
include "koneksi.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM supplier WHERE id='$id'");
echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
?>
