<?php
session_start();
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:login.php?pesan=Anda belum login!");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Halaman Utama</title></head>
<body style="font-family: sans-serif; margin:0;">
    <?php include 'navbar.php'; ?>
    <div style="padding: 20px;">
        <h2>Selamat Datang, <?php echo $_SESSION['nama']; ?>!</h2>
        <p>Status Login: <b><?php echo ($_SESSION['level'] == 1) ? "Admin" : "User Biasa"; ?></b></p>
        <hr>
        <p>Silakan pilih menu navigasi di atas.</p>
    </div>
</body>
</html>