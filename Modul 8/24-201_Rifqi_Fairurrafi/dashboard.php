<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient px-4">
    <a class="navbar-brand fw-bold" href="#">Sistem Penjualan</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">

            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>

            <?php if ($_SESSION['level'] == 1) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dataMasterDropdown" role="button" data-bs-toggle="dropdown">
                    Data Master
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Data User</a></li>
                    <li><a class="dropdown-item" href="#">Data Barang</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link" href="#">Transaksi</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Laporan</a>
            </li>

        </ul>

        <div class="d-flex">
            <span class="text-white me-3 fw-bold"> <?= htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout.php" class="btn btn-light btn-sm" onclick="return confirm('Yakin ingin keluar dari sistem?')">Logout</a>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
