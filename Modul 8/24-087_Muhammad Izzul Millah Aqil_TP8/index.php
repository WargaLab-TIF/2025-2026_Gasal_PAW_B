<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .navbar-custom {
    background: linear-gradient(to bottom, #0a4c8b, #053b78);
    }
    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

    <div class="container">

        <a class="navbar-brand" href="index.php">📓 Sistem Penjualan</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <?php if ($_SESSION['role'] === "Admin") : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="data_master.php">Data Master</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Transaksi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../../Modul 7/24-087_Muhammad Izzul Millah Aqil_TP7/index.php">Laporan</a>
                    </li>


                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Modul 7/24-087_Muhammad Izzul Millah Aqil_TP7/index.php">Laporan</a>
                    </li>
                <?php endif; ?>

            </ul>

            <span class="navbar-text me-3">
                Halo, <?= $_SESSION['user']; ?> (<?= $_SESSION['role']; ?>)
            </span>

            <a href="login.php"onclick="return confirm('Apakah Anda yakin ingin logout?')" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>


<div class="container mt-4">
    <h3>Selamat Datang, <?= $_SESSION['user']; ?>!</h3>
    <p class="text-muted">Anda login sebagai <b><?= $_SESSION['role']; ?></b>.</p>
</div>

</body>
</html>
