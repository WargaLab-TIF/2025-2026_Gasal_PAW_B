<?php
require "config.php";     // Memanggil koneksi database
require "functions.php";  // Memanggil fungsi-fungsi umum (termasuk cekLogin)
cekLogin();               // Mengecek apakah user sudah login

// Mengambil data user dari session
$user  = $_SESSION['user']['username'];
$level = $_SESSION['user']['level'];

// Menangkap halaman yang akan ditampilkan
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* ---------------- NAVBAR STYLE ---------------- */
.navbar-custom {
    background-color: #0a4b86; /* Warna biru gelap */
}

/* Warna teks navbar */
.navbar-custom .navbar-brand,
.navbar-custom .nav-link,
.navbar-custom .dropdown-toggle {
    color: #ffffff !important;
}

/* Dropdown agar tidak terlalu kecil */
.dropdown-menu {
    min-width: 180px;
}

/* Style tombol logout */
.logout {
    background: #d9534f !important;
    color: white !important;
    text-align: center;
}
.logout:hover {
    background: #c9302c !important;
}
</style>

</head>
<body>

<!-- ========================= NAVBAR ========================= -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">

        <!-- Judul kiri navbar -->
        <a class="navbar-brand" href="#">Sistem Penjualan</a>

        <!-- Tombol toggle (jika tampilan mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon" style="filter:invert(1);"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- Menu kiri -->
            <ul class="navbar-nav me-auto">

                <!-- MENU: Home -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=home">Home</a>
                </li>

                <!-- MENU: Data Master (khusus level 1 / admin) -->
                <?php if ($level == 1): ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=data_master">Data Master</a>
                </li>
                <?php endif; ?>

                <!-- MENU: Transaksi -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=transaksi">Transaksi</a>
                </li>

                <!-- MENU: Laporan -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=laporan">Laporan</a>
                </li>

            </ul>

            <!-- ================= USER DROPDOWN ================= -->
            <div class="dropdown">

                <!-- Tombol nama user -->
                <a class="dropdown-toggle text-white" href="#" data-bs-toggle="dropdown">
                    <?= $user ?>
                </a>

                <!-- Dropdown isi -->
                <ul class="dropdown-menu dropdown-menu-end">

                    <!-- Role User -->
                    <li>
                        <h6 class="dropdown-header">Role: <?= $level ?></h6>
                    </li>

                    <!-- Tombol logout -->
                    <li>
                        <a class="dropdown-item logout" 
                           href="logout.php"
                           onclick="return confirm('Yakin ingin keluar?')">
                            Logout
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- ======================= END NAVBAR ======================= -->


<!-- ========================= ISI HALAMAN ========================= -->
<div class="container mt-4">

<?php 
/* 
    Sistem router simple
    Mengatur konten berdasarkan nilai ?page=
*/
switch ($page) {

    /* ------------------------ HOME ------------------------ */
    case 'home':
        ?>
        <div class="card shadow">
            <div class="card-body">
                <h3>Home</h3>
                <p>Selamat datang, <?= $user ?> (Level <?= $level ?>).</p>
            </div>
        </div>
        <?php
    break;

    /* --------------------- DATA MASTER --------------------- */
    case 'data_master':

        // Jika bukan admin → blok akses
        if ($level != 1) {
            echo "<div class='alert alert-danger'>Akses ditolak!</div>";
            break;
        }
        ?>
        <div class="card shadow">
            <div class="card-body">
                <h3>Data Master</h3>
                <p>Menu ini digunakan untuk mengelola data barang, kategori, atau data dasar lainnya.</p>
            </div>
        </div>
        <?php
    break;

    /* --------------------- TRANSAKSI --------------------- */
    case 'transaksi':
        ?>
        <div class="card shadow">
            <div class="card-body">
                <h3>Transaksi</h3>
                <p>Menu untuk melakukan transaksi penjualan.</p>
            </div>
        </div>
        <?php
    break;

    /* ----------------------- LAPORAN ----------------------- */
    case 'laporan':
        ?>
        <div class="card shadow">
            <div class="card-body">
                <h3>Laporan</h3>
                <p>Menu untuk melihat laporan penjualan.</p>
            </div>
        </div>
        <?php
    break;

    /* ---------------- HALAMAN TIDAK ADA ---------------- */
    default:
        echo "<div class='alert alert-warning'>Halaman tidak ditemukan.</div>";
    break;
}
?>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
