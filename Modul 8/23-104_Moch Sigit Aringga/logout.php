<?php 
// logout.php
session_start();

// Menghapus semua session
session_destroy();

// Mengalihkan halaman kembali ke index/login
header("location:login.php?pesan=logout");
?>