<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "reporting";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    echo "Koneksi Gagal";
}
