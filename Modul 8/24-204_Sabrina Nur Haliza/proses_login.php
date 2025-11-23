<?php
session_start();
include "koneksi.php"; // Koneksi ke database

// Ambil input & amankan dari karakter berbahaya
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = md5($_POST['password']); // Enkripsi MD5 (sesuai praktikum)

// Cek data user di database
$q = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($q);

if ($data) {
    session_regenerate_id(true); // Amankan session

    // Simpan data user ke session
    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['id_user'] = $data['id_user'];

    // Jika benar, masuk ke home
    header("Location: home.php");
    exit;
} else {
    // Jika salah, kembali ke login dengan pesan error
    header("Location: login.php?error=1");
    exit;
}
?>
