<?php
 
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "db_gudang";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi ke database 'db_gudang' gagal: " . mysqli_connect_error());
}
?>