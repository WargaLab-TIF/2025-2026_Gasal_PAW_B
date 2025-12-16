<?php
$servername = "localhost";
$username = "root";
$password = "Password123!"; 
$dbname = "penjualan_db"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// echo "Koneksi berhasil! <br><br>";

?>
