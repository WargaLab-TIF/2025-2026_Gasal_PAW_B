<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$level = isset($_SESSION['level']) ? $_SESSION['level'] : 0;
$nama = isset($_SESSION['user']) ? $_SESSION['user'] : 'Guest';
?>
<nav class="navbar">
    <div class="wadah">
        <div style="display: flex; align-items: center;">
            <a class="navbar-brand" href="/Praktikum/2025-2026_Gasal_PAW_B/Modul%208/24-144_Zakaria_Mujur_Prasetyo/index.php">Sistem Penjualan</a>
            <div class="navbar-menu">
                <a href="/Praktikum/2025-2026_Gasal_PAW_B/Modul%208/24-144_Zakaria_Mujur_Prasetyo/index.php">Home</a>
                
                <?php if ($level == 1) : ?>
                    <div class="dropdown">
                        <a href="#" class="dropbtn">Data Master &#9662;</a>
                        <div class="dropdown-content dropdown-menu-left">
                            <a href="/TPPMODUL/Modul%206/barang_form.php">Barang</a>
                            <a href="/challenge/data%20master%20pellangan/">Pelanggan</a>
                            <a href="/Praktikum/2025-2026_Gasal_PAW_B/Modul%205/24-144_Zakaria_Mujur_Prasetyo/supplier.php">Supplier</a>
                            <a href="/TPPMODUL/Modul%208/user-tampil.php">User</a>
                        </div>
                    </div>
                    <a href="/Praktikum/2025-2026_Gasal_PAW_B/Modul%206/24-144_Zakaria_Mujur_Prasetyo/nota_input.php">Transaksi</a>
                    <a href="/Praktikum/2025-2026_Gasal_PAW_B/Modul%207/24-144_Zakaria_Mujur_Prasetyo/">Laporan</a>
                <?php elseif ($level == 2) : ?>
                    <a href="/Praktikum/2025-2026_Gasal_PAW_B/Modul%206/24-144_Zakaria_Mujur_Prasetyo/nota_input.php">Transaksi</a>
                    <a href="/Praktikum/2025-2026_Gasal_PAW_B/Modul%207/24-144_Zakaria_Mujur_Prasetyo/">Laporan</a>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="navbar-user">
            <div class="dropdown">
                <a href="#" style="color: white; text-decoration: none;">
                    <?= $nama; ?> &#9662;
                </a>
                <div class="dropdown-content dropdown-menu-right">
                    <a href="/Praktikum/2025-2026_Gasal_PAW_B/Modul%208/24-144_Zakaria_Mujur_Prasetyo/logout.php" onclick="return confirm('Yakin ingin keluar?')">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>
