<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['login'])) {
    return;
}
?>
<nav class="bg-sky-800 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between h-14">
            <div class="flex items-center gap-6">
                <div class="font-bold text-lg">Sistem Penjualan</div>
                <a href="home.php" class="hover:text-sky-200 transition">Home</a>

                <?php 
                if ($_SESSION['level'] == 1): 
                ?>
                    <a href="master.php" class="hover:text-sky-200 transition font-semibold text-yellow-300">Data Master</a>
                <?php endif; ?>

                <a href="transaksi.php" class="hover:text-sky-200 transition">Tranaksi</a>
                <a href="laporan.php" class="hover:text-sky-200 transition">Laporan</a>
            </div>

            <div class="flex items-center gap-3">
                <div class="text-sm mr-4 hidden sm:block">
                    Halo, <span class="font-medium"><?=htmlspecialchars($_SESSION['nama'])?></span> 
                    (Lvl: <?=htmlspecialchars($_SESSION['level'])?>)
                </div>
                <a href="logout.php" class="bg-sky-600 px-4 py-1.5 rounded hover:bg-sky-500 text-sm transition shadow">Logout</a>
            </div>
        </div>
    </div>
</nav>