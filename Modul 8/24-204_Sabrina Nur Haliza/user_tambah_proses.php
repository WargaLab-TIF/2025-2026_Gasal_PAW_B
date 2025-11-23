<?php
include 'koneksi.php'; // Hubungkan ke database

// Ambil data dari form + amankan input
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = md5($_POST['password']); // Enkripsi MD5 (sesuai aturan praktikum)
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$hp = mysqli_real_escape_string($koneksi, $_POST['hp']);
$level = intval($_POST['level']); // Level harus angka

// Query tambah data user
mysqli_query($koneksi, "INSERT INTO user (username,password,nama,alamat,hp,level) VALUES (
    '$username','$password','$nama','$alamat','$hp',$level
)");

// Kembali ke halaman user
header('Location: user.php');
exit;
?>
