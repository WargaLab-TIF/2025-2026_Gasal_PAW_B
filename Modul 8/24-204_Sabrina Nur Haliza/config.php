<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "modul_8";

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi, jika gagal tampilkan error
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mulai session untuk menyimpan data user
session_start();
?>
