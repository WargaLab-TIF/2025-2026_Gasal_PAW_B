<?php
$koneksi = mysqli_connect("localhost", "root", "", "tp6");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
