<?php include '../koneksi.php';
mysqli_query($conn, "DELETE FROM barang WHERE id='$_GET[id]'");
header("location:../master_barang.php");
