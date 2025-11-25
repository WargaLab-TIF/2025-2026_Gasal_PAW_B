<?php
$koneksi = mysqli_connect("localhost", "root", "", "modul8_praktikum");

if(!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
