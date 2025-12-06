<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "penjualan_tp5";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>