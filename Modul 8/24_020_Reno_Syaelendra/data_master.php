<?php 
session_start(); include 'koneksi.php';
if($_SESSION['status']!="login" || $_SESSION['level']!=1){ header("location:index.php"); exit; }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu Data Master</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Kelola Data Master</h2>
        <div class="grid-menu">
            <a href="master_barang.php" class="menu-card"> <i class="fas fa-box"></i> <h3>Data Barang</h3> </a>
            <a href="master_supplier.php" class="menu-card"> <i class="fas fa-truck"></i> <h3>Data Supplier</h3> </a>
            <a href="master_pelanggan.php" class="menu-card"> <i class="fas fa-users"></i> <h3>Data Pelanggan</h3> </a>
            <a href="master_user.php" class="menu-card"> <i class="fas fa-user-shield"></i> <h3>Data User</h3> </a>
        </div>
    </div>
</body>
</html>