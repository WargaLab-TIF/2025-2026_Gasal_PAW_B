<?php

require_once "koneksi.php";

$sql = "CREATE TABLE supplier (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(150) NOT NULL,
  telp VARCHAR(20) NOT NULL,
  alamat TEXT NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "berhasil";
} else {
    echo "error:" . mysqli_error($conn);
}

mysqli_close($conn);
?>