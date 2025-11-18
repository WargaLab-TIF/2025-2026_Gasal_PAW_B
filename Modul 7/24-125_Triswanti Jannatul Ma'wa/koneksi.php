<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";           // sesuaikan jika pakai password
$db   = "grafiktp7"; // ganti dengan nama database Anda

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
