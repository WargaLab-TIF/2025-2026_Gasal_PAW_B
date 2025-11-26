<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != "1") {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">System Penjualan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
          <li class="nav-item"><a class="nav-link active" href="admin.php">Home</a></li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Data Master</a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="master1.php">Master 1</a></li>
                  <li><a class="dropdown-item" href="master2.php">Master 2</a></li>
              </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="transaksi.php">Transaksi</a></li>
          <li class="nav-item"><a class="nav-link" href="laporan.php">Laporan</a></li>
          <li class="nav-item"><a class="nav-link" href="helo.php">Hello</a></li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
            <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['nama']; ?>&background=0D6EFD&color=fff&rounded=true" 
                 width="32" height="32" class="rounded-circle me-2">
            <?php echo $_SESSION['nama']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><h6 class="dropdown-header"><?php echo $_SESSION['nama']; ?></h6></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section class="hero text-center">
    <h1>Selamat Datang, Admin!</h1>
    <p>Kelola data master, transaksi, dan laporan sistem penjualan.</p>
</section>

<div class="container text-center mt-5">

    <div class="row justify-content-center g-4">

        <div class="col-md-3">
            <div class="menu-box">
                <h4>Data Master</h4>
                <p>Kelola Data User & Master.</p>
                <a href="master1.php" class="btn btn-primary">Buka</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="menu-box">
                <h4>Transaksi</h4>
                <p>Input transaksi penjualan.</p>
                <a href="transaksi.php" class="btn btn-primary">Buka</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="menu-box">
                <h4>Laporan</h4>
                <p>Lihat laporan penjualan.</p>
                <a href="laporan.php" class="btn btn-primary">Buka</a>
            </div>
        </div>

    </div>

</div>

<footer class="footer">
    <p>© 2025 Sistem Penjualan</p>
</footer>

</body>
</html>
