<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "toko_online";

$cont = mysqli_connect($host, $user, $pass, $db);
if (!$cont) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
