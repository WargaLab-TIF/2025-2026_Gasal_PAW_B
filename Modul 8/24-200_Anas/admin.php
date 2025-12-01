<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['login'] != true ){
    header("location:login.php?pesan=belum_login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style.css">
    <style>
        nav { background-color: #0d47a1; color: white; display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; }
        .nav-links a { color: white; text-decoration: none; margin-right: 15px; padding: 5px 10px; border-radius: 4px; transition: 0.3s; }
        .nav-links a:hover, .nav-links a.active { background-color: #1565c0; }
        .user-info { font-weight: bold; }
        .logout-btn { background-color: #c62828; padding: 5px 15px; border-radius: 4px; text-decoration: none; color: white; font-size: 14px; }
    </style>
</head>
<body>

<nav>
    <div class="nav-links">
        <strong>Sistem Penjualan</strong> | 
        <a href="admin.php" class="active">Home</a>

        <?php if($_SESSION['level'] == 1) {?>
            
            <a href="tabel_user.php">Data Master</a>
            <a href="#">Transaksi</a>
            <a href="#">Laporan</a>

        <?php } elseif($_SESSION['level'] == 2) {?>
            
            <a href="#">Transaksi</a>
            <a href="#">Laporan</a>

        <?php } ?>
    </div>

    <div class="user-info">
        Halo, <?= $_SESSION['nama'] ?> 
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</nav>

<div class="container">
    <h1>Selamat Datang di Halaman Utama</h1>
    <div style="background: white; padding: 20px; border-radius: 8px; border: 1px solid #ddd;">
        <p>Anda Login sebagai: 
            <span style="font-weight: bold; color: #0d47a1;">
                <?= ($_SESSION['level'] == 1) ? "ADMINISTRATOR" : "USER BIASA"; ?>
            </span>
        </p>
    </div>
</div>

</body>
</html>