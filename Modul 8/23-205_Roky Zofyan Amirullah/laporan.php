<?php 
session_start(); 
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){ header("location:login.php?pesan=Anda belum login!"); exit; }
?>
<!DOCTYPE html>
<html><head><title>Laporan</title></head>
<body style="font-family:sans-serif; margin:0;">
    <?php include 'navbar.php'; ?>
    <div style="padding:20px;"><h1>Halaman Laporan</h1><p>Halaman laporan penjualan.</p></div>
</body></html>