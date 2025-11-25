<?php
session_start();
include "../proteck.php";
include "../koneksi.php";


if($_SESSION['role'] != 2){
    header("Location: ../admin/index.php");
}
?>
<link rel="stylesheet" href="../style2.css">

<div class="container">
    <h2>Dashboard User</h2>

    <nav>
        <!-- MENU KIRI -->
        <div class="nav-left">
            <a href="index.php">Home</a>
            <a href="transaksi.php">Transaksi</a>
            <a href="laporan.php">Laporan</a>
        </div>

        <!-- KANAN: NAMA USER -->
        <div class="nav-right">
            <div class="user-menu">
                 <?php echo $_SESSION['nama']; ?>

                <div class="dropdown">
                <a href="../logout.php">Logout</a>
            </div>
        </div>
    </nav>

</div>
