<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistem Penjualan</title>
    <style>
        .navbar {
            background-color: #004f9e;
            color: white;
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .menu {
            display: flex;
            
            gap: 15px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
            font-size: 15px;
        }

        .right { 
            font-size: 15px; 
            font-weight: bold;
        }

        .logout { 
            color: yellow; 
            text-decoration: none; 
            margin-left: 10px; 
        }

        .content {
            padding: 25px;
            font-family: Arial, sans-serif;
        }

        h2 { margin-top: 0; }
    </style>
</head>
<body>

<div class="navbar">

    <div class="menu">
        <b>Sistem Penjualan</b>
        <a href="index.php">Home</a>

        <!-- Menu berdasarkan role -->
        <?php if ($_SESSION['role'] == 'admin') : ?>
            <a href="#">Data Master</a>
            <a href="#">Transaksi</a>
            <a href="#">Laporan</a>
        <?php else : ?>
            <a href="#">Transaksi</a>
            <a href="#">Laporan</a>
        <?php endif; ?>
    </div>

    <div class="right">
        <?php echo $_SESSION['user']; ?> |
        <a href="logout.php" class="logout">Logout</a>
    </div>

</div>

<div class="content">
    <h2>Selamat Datang, <?= $_SESSION['user']; ?>!</h2>
    <p>Anda login sebagai <b><?= $_SESSION['role']; ?></b>.</p>

    <p>Ini adalah halaman dashboard utama yang hanya dapat diakses setelah login.</p>
    <hr>
    <p>Silakan pilih menu navigasi di atas untuk melanjutkan.</p>
</div>

</body>
</html>
