<?php
require_once "koneksi.php";

$sql = "CREATE TABLE supplier (
   id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(100),
    telp VARCHAR(12),
    alamat TEXT
)";

if(mysqli_query($cont,$sql)){
    echo "tabel berhasil";
}