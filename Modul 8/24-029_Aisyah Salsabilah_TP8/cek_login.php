<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

// Mencari user di database
$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($query);
    // SIMPAN DATA PENTING KE SESSION
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $data['nama']; // Untuk ditampilkan di pojok kanan
    $_SESSION['level'] = $data['level']; // Untuk logika menu
    $_SESSION['login'] = true; // Menandai bahwa user sudah login
    header("location:index.php"); // Alihkan ke halaman utama
} else {
    echo "<script>alert('Login Gagal!'); window.location='login.php';</script>";
}
?>