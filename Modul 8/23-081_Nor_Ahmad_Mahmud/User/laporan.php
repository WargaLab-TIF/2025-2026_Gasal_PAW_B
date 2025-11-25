<?php
session_start();
include "../proteck.php";

if($_SESSION['role'] != 2){
    header("Location: ../Admin/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Laporan User</title>
<link rel="stylesheet" href="../style2.css">
</head>
<body>

<div class="container">

<nav>
    <div class="nav-left">
        <a href="index.php">Home</a>
        <a href="transaksi.php">Transaksi</a>
        <a href="laporan.php">Laporan</a>
    </div>

    <div class="nav-right">
        <div class="user-menu">
            User: <?php echo $_SESSION['nama']; ?>

            <div class="dropdown">
                <a href="../logout.php">Logout</a>
            </div>
        </div>
    </div>
</nav>

<h2>Laporan User</h2>

<div class="content-box">
    <!-- ISI DI SINI -->
    <p>Isi laporan user akan kamu tambahkan nanti.</p>
</div>

</div>

</body>
</html>
