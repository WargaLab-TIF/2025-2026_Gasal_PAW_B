<?php
$host = "localhost";
$user = "root";      // sesuaikan
$pass = "";          // sesuaikan
$db   = "penjualan"; // nama database

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
