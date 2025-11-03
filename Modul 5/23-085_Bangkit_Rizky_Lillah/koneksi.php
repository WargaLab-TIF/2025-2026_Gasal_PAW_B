<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko_online");

if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
