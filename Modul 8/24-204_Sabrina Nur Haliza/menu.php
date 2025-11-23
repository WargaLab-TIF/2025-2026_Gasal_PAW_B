<?php
// Mulai session jika belum aktif
if (!isset($_SESSION)) session_start();
?>
<div style="background:#eee; padding:10px;">
    <!-- Menu selalu tampil -->
    <a href="home.php">Home</a>

    <?php 
    // Jika level = 1 (admin), tampilkan menu Data Master
    if (isset($_SESSION['level']) && $_SESSION['level'] == 1) { ?>
        <a href="user.php">Data Master</a>
    <?php } ?>

    <!-- Menu transaksi & laporan selalu muncul -->
    <a href="transaksi.php">Transaksi</a>
    <a href="laporan.php">Laporan</a>

    <!-- Tampilkan nama user di kanan -->
    <span style="float:right;">
        Login: 
        <b><?= isset($_SESSION['nama']) ? htmlspecialchars($_SESSION['nama']) : ''; ?></b>
    </span>
</div>
<br>
