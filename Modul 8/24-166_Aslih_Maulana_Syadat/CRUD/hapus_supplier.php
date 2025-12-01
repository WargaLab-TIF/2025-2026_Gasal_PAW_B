<?php include '../koneksi.php';
mysqli_query($conn, "DELETE FROM supplier WHERE id='$_GET[id]'");
header("location:../master_supplier.php");
