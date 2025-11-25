<?php
// Cek status session dulu. 
// Jika belum ada session yang aktif, baru kita start.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah user sudah login (berdasarkan status 'login')
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    // Redirect ke halaman login jika belum login
    header("location:../login.php?pesan=belum_login");
    exit();
}
?>