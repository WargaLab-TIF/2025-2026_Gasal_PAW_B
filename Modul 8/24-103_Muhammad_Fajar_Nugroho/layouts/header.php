<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username']) || $_SESSION['username'] === '') {
    echo "<script>window.location.href='/pages/login/';</script>";
    exit;
}
$nama = $_SESSION['nama'] ?? $_SESSION['username'];
$level_num = isset($_SESSION['level']) ? intval($_SESSION['level']) : 0;
$level = ($level_num === 1) ? 'admin' : (($level_num === 2) ? 'kasir' : 'user');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-book"></i> Sistem Penjualan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/pages/home/">Home</a>
                </li>
                <?php if ($level == 'admin') { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Data Master
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/pages/barang/">Master Barang</a></li>
                        <li><a class="dropdown-item" href="/pages/supplier/">Master Supplier</a></li>
                        <li><a class="dropdown-item" href="/pages/user/">Master User</a></li>
                    </ul>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link active" href="/pages/transaksi/">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/pages/laporan/">Laporan</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?php echo $nama; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

