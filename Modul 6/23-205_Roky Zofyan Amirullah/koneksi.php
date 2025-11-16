<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tp6_paw";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("koneksi gagal." . mysqli_connect_error());
}
?>