<?php
$host = "localhost:3307";
$user = "root";
$pass = "";
$db   = "modul8_praktikum";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>