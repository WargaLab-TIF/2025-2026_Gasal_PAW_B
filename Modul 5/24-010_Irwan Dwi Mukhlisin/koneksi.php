<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "penjualan";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "koneksi error";
}