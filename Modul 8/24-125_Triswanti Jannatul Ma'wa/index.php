<?php
session_start();

if (!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar-brand { font-weight: bold; letter-spacing: 1px;}
        .dropdown-menu-end { right: 0; left: auto; }
        .bg-gradasi {
            background: linear-gradient(100deg, #001f3f, #003366);
        }
    </style>
</head>
<body>
    <nav class="bg-gradasi navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                📑Sistem Penjualan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="index.php">Home</a>
                    </li>
                    <?php if ($_SESSION['role'] == 'Admin') : ?>
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="#">Data Master</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Transaksi</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Laporan</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Halo, <b><?= $_SESSION['user']; ?></b>
                        </a> 
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><span class="dropdown-item-text text-muted small">Role: <?= $_SESSION['role']; ?></span></li>
                            <li><hr class="dropdown-divider"></li>
                            
                            <li><a class="dropdown-item" href="#">Lihat Profil</a></li>
                            <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                            
                            <li><hr class="dropdown-divider"></li>
                            
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>