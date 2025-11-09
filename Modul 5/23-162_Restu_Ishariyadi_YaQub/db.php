<?php
 
$servername = "localhost:3307";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE db_gudang";

if (mysqli_query($conn, $sql)) {
    echo "DATABASE BERHASIL DIBUAT";
} else {
    echo "ERROR: " . mysqli_error($conn);
}

mysqli_close($conn);
?>