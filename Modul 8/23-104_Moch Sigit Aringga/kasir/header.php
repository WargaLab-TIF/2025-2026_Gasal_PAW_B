<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark" style="background:#004a8f;">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold text-white">
            <i class="fa fa-store"></i> Sistem Penjualan
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link text-white" href="/praktikumpaw25/2025-2026_Gasal_PAW_B/Modul 8/23-104_Moch Sigit Aringga/kasir/dashboard.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="transkasi/index.php">transaksi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="laporan.php">Laporan</a>
                </li>

            </ul>
        </div>

        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="fa fa-user"></i> <?= $_SESSION['nama']; ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Profil</a></li>
                <li><a class="dropdown-item text-danger" href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </div>

    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>