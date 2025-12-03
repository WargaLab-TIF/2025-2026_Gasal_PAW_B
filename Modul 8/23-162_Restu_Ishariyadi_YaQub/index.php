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
    <title>Sistem Penjualan</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .navbar-brand { font-weight: bold; letter-spacing: 1px; }
        .bg-custom { background-color: #0d6efd; } 
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-store me-2"></i>Sistem Penjualan
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
                        <a class="nav-link" href="#">Data Master</a>
                    </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transaksi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Laporan</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active fw-bold" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> <?= $_SESSION['user']; ?>
                        </a>
                        
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><span class="dropdown-item-text text-muted small">Level: <?= $_SESSION['role']; ?></span></li>
                            <li><hr class="dropdown-divider"></li>
                            
                            <li>
                                <a class="dropdown-item text-danger" href="logout.php" onclick="return confirm('Yakin ingin keluar?')">
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
        <div class="card shadow-sm">
            <div class="card-body p-5 text-center">
                <h2 class="mb-3">Selamat Datang, <?= $_SESSION['user']; ?>!</h2>
                <p class="lead text-muted">
                    Anda login sebagai <strong><?= $_SESSION['role']; ?></strong>.
                </p>
                
                <hr class="my-4">
                
                <div class="alert alert-info" role="alert">
                    <?php if ($_SESSION['role'] == 'Admin') : ?>
                        <i class="fas fa-info-circle"></i> Karena Anda <b>Admin</b>, Anda bisa melihat menu <b>Data Master</b> di atas.
                    <?php else : ?>
                        <i class="fas fa-info-circle"></i> Karena Anda <b>User Biasa</b>, menu Data Master <b>disembunyikan</b>.
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>