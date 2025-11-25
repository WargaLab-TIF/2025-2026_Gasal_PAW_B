<?php
session_start();
include "../proteck.php";

if($_SESSION['role'] != 1){
    header("Location: ../User/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Master</title>
<link rel="stylesheet" href="../style2.css">
</head>
<body>

<div class="container">

<nav>
    <div class="nav-left">
        <a href="index.php">Home</a>
        <a href="data_master.php">Data Master</a>
        <a href="transaksi.php">Transaksi</a>
        <a href="laporan.php">Laporan</a>
    </div>

    <div class="nav-right">
        <div class="user-menu">
            Admin: <?php echo $_SESSION['nama']; ?>

            <div class="dropdown">
                <a href="../logout.php">Logout</a>
            </div>
        </div>
    </div>
</nav>

<h2>Data Master</h2>

<div class="content-box">
    <!-- ISI DI SINI -->
    <p>Isi halaman Data Master nanti kamu jelaskan.</p>
</div>

</div>

</body>
</html>
