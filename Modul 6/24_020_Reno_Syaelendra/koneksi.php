<?php
// FILE: koneksi.php
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "db_transaksi_penjualan"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>