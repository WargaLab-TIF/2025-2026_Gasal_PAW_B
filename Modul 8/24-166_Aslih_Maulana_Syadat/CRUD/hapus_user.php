<?php include '../koneksi.php';
mysqli_query($conn, "DELETE FROM user WHERE id_user='$_GET[id]'");
header("location:../master_user.php");
