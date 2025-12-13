<?php 

$host = "localhost";
$username = "root";
$pw = "";
$dbname = "reporting";

try {
    $conn = mysqli_connect($host, $username, $pw, $dbname);
    echo "Koneksi Berhasil" ;
} catch (Exception $e) {
    echo "Koneksi Gagal: " . $e ;
}