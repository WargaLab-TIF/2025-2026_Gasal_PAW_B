<?php
session_start();
include "../proteck.php";
include "../koneksi.php";


// cek apakah admin
if($_SESSION['role'] != 1){
    header("Location: ../user/index.php");
}
?>
<link rel="stylesheet" href="../style2.css">

<div class="container">
    <h2>Dashboard Admin</h2>

    <nav>
        <!-- MENU KIRI -->
        <div class="nav-left">
            <a href="index.php">Home</a>
            <a href="data_master.php">Data Master</a>
            <a href="transaksi.php">Transaksi</a>
            <a href="laporan.php">Laporan</a>
        </div>

        <!-- KANAN: NAMA USER -->
        <div class="nav-right">
            <div class="user-menu">
                Admin: <?php echo $_SESSION['nama']; ?>

                <div class="dropdown">
                <a href="../logout.php">Logout</a>
            </div>
        </div>
</div>

    </nav>

</div>
