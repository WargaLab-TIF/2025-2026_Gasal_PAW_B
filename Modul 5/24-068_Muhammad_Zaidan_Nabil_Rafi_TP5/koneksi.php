<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_supplier");

if (!$koneksi) {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
?>
