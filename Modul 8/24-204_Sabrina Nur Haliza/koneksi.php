<?php
$koneksi = mysqli_connect("localhost", "root", "", "modul8_session_security");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
