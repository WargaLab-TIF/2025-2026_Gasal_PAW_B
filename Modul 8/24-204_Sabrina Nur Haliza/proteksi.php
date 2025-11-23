<?php
session_start(); // Mulai session

// Cek apakah user sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php"); // Jika belum login, kembali ke login
    exit;
}
?>
