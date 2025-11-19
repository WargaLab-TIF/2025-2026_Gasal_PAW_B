<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "tpp5_penjualan";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi) {
    die("Koneksi Gagal!");
} else {
    echo "Koneksi Berhasil";
}