<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script>
        function hapusData(id) {
            if (confirm("Anda yakin akan menghapus data ini?")) {
                window.location.href = "hapus.php?id=" + id;
            }
        }
    </script>
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
                <?php if($_SESSION['role'] == "1") { ?>
                    <li class="nav-item"><a class="nav-link" href="admin.php">Home</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Data Master</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="master1.php">Master 1</a></li>
                            <li><a class="dropdown-item" href="master2.php">Master 2</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if($_SESSION['role'] == "2") { ?>
                    <li class="nav-item"><a class="nav-link" href="user.php">Home</a></li>
                <?php } ?>

                <li class="nav-item"><a class="nav-link" href="transaksi.php">Transaksi</a></li>
                <li class="nav-item"><a class="nav-link active" href="laporan.php">Laporan</a></li>
                <?php if($_SESSION['role'] == '1') {?>
                    <li class="nav-item"><a class="nav-link" href="helo.php">Hello</a></li>
                <?php }?>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center"
                       href="#" role="button" data-bs-toggle="dropdown">
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['nama']); ?>&background=0D6EFD&color=fff&rounded=true"
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


<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="m-0">Laporan Penjualan</h3>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
