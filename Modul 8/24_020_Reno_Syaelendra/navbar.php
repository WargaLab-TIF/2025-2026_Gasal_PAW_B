<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<div class="navbar">
    <div class="nav-left">
        <div class="brand">SISTEM PENJUALAN</div>
        <a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
        <?php if($_SESSION['level'] == 1) { ?>
            <div class="nav-dropdown">
                <a href="data_master.php" class="<?php echo (strpos($current_page, 'master') !== false || $current_page == 'data_master.php') ? 'active' : ''; ?>">Data Master <span class="dropdown-arrow">▼</span></a>
                <div class="nav-dropdown-content">
                    <a href="master_barang.php">Data Barang</a>
                    <a href="master_supplier.php">Data Supplier</a>
                    <a href="master_pelanggan.php">Data Pelanggan</a>
                    <a href="master_user.php">Data User</a>
                </div>
            </div>
        <?php } ?>
        <a href="transaksi.php" class="<?php echo ($current_page == 'transaksi.php') ? 'active' : ''; ?>">Transaksi</a>
        <a href="laporan.php" class="<?php echo ($current_page == 'laporan.php') ? 'active' : ''; ?>">Laporan</a>
    </div>
    <div class="nav-right">
        <div class="dropdown" onclick="toggleDropdown()">
            <button class="dropdown-btn"><?php echo $_SESSION['nama']; ?> <span class="dropdown-arrow">▼</span></button>
            <div class="dropdown-content" id="dropdownMenu">
                <a href="logout.php" class="logout-link">Logout</a>
            </div>
        </div>
    </div>
    <script>
        function toggleDropdown() {
            var menu = document.getElementById('dropdownMenu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }
        
        document.addEventListener('click', function(event) {
            var dropdown = document.querySelector('.dropdown');
            if (!dropdown.contains(event.target)) {
                document.getElementById('dropdownMenu').style.display = 'none';
            }
        });
    </script>
</div>