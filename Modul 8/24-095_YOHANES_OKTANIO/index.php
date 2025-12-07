<?php
    session_start();
    if (!isset($_SESSION['user']) || !isset($_SESSION['role'])) {
        header('Location: login.php');
        exit();
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
        .navbar-brand { font-weight: bold; letter-spacing: 1px; }
        .dropdown-menu-end { right: 0; left: auto; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fa-solid fa-book"></i> Sistem Penjualan
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
                        <a class="nav-link text-warning" href="#">Data Master</a>
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
                        <a class="nav-link dropdown-toggle active" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['user']; ?>&background=random" alt="Profile" class="rounded-circle me-1" width="30" height="30">
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

    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white p-3">
                <h5 class="mb-0">Dashboard Utama</h5>
            </div>
            <div class="card-body p-4">
                <h2 class="card-title fw-light">Selamat Datang di Sistem!</h2>
                <p class="card-text lead text-muted">
                    Ini adalah halaman yang diproteksi menggunakan <b>Session</b>. Hanya user yang sudah login yang bisa melihat halaman ini.
                </p>
                <hr>
                <a href="#" class="btn btn-outline-primary">
                    <i class="fas fa-user-circle me-1"></i> Lihat Profil Lengkap
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>