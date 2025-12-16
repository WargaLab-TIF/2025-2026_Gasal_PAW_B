<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE FROM supplier WHERE id='$_GET[id]'");
echo "<script>alert('Data Terhapus');document.location='index.php'</script>";
?>
