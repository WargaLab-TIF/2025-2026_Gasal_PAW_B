<?php include '../koneksi.php';
mysqli_query($conn, "DELETE FROM pelanggan WHERE id='$_GET[id]'");
header("location:../master_pelanggan.php");
