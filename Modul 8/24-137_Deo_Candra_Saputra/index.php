
<?php
require 'functions.php';
if (!isset($_SESSION['user'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .navbar-custom {
    background: linear-gradient(to bottom, #0a4c8b, #053b78);
    }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas"></i>📑 Sistem Penjualan
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <?php if ($_SESSION['role'] == 'Admin') : ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="../../Modul 6/24-137_Deo_Candra_Saputra/transaksi_form.php">Data Master</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="../../Modul 6/24-137_Deo_Candra_Saputra/transaksi_form.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../../Modul 7/24-137_Deo_Candra_Saputra/index.php">Laporan</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <b><?= $_SESSION['user']; ?></b>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><span class="dropdown-item-text text-muted small">Role: <?= $_SESSION['role']; ?></span></li>
                            <li>
                                <a class="dropdown-item text-danger fw-bold" href="logout.php" onclick="return confirm('Yakin ingin keluar?')">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="container mt-5">
            <div class="card-header bg-primary text-white p-3">
                <h5 class="mb-0">Dashboard Utama</h5>
            </div>
            <div class="card-body p-4">
                <h3>Selamat Datang, <?= $_SESSION['user']; ?>!</h3>
                <p class="text-muted">Anda login sebagai <b><?= $_SESSION['role']; ?></b>.</p>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>