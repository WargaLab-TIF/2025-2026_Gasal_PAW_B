<?php include "config.php"; include "protect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Aplikasi</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
        <?php if ($_SESSION['level'] == 1): ?>
          <li class="nav-item"><a class="nav-link" href="data_master.php">Data Master</a></li>
        <?php endif; ?>
        <li class="nav-item"><a class="nav-link" href="transaksi.php">Transaksi</a></li>
        <li class="nav-item"><a class="nav-link" href="laporan.php">Laporan</a></li>
      </ul>
      <span class="navbar-text text-white me-3">
        <?php echo $_SESSION['username']; ?>
      </span>
      <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
  </div>
</nav>
<div class="container mt-4">
  <h3>Selamat datang, <?php echo $_SESSION['username']; ?>!</h3>
</div>
</body>
</html>
