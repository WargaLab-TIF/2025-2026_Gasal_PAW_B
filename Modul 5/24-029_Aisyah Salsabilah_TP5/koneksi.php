<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "penjualan";

$conn = new mysqli($server, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>