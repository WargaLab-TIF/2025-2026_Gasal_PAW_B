<?php
session_start();
// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="background-color: #0d47a1 !important;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sistem Penjualan</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        
        <li class="nav-item">
          <a class="nav-link active" href="#">Home</a>
        </li>

        <?php if ($_SESSION['level'] == 1) { ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Data Master</a>
        </li>
        <?php } ?>

        <li class="nav-item">
          <a class="nav-link" href="#">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Laporan</a>
        </li>

      </ul>

      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <?php echo $_SESSION['nama']; ?> 
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <h1>
        <?php 
        // Cek level user
        if ($_SESSION['level'] == 1) {
            echo "Selamat Datang, admin " . $_SESSION['nama'] . "!";
        } else {
            // Jika bukan level 1 (berarti level 2/User)
            echo "Selamat Datang, user " . $_SESSION['nama'] . "!";
        }
        ?>
    </h1>
    <p>Anda login sebagai level: <?php echo $_SESSION['level']; ?></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>