<?php 
session_start();
include 'koneksi.php';
if($_SESSION['status'] != "login"){ header("location:login.php?pesan=belum_login"); exit; }

$q1 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang");
$barang = mysqli_fetch_assoc($q1);

$q2 = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM penjualan");
$transaksi = mysqli_fetch_assoc($q2);

$q3 = mysqli_query($koneksi, "SELECT SUM(total_harga) as total FROM penjualan");
$pendapatan = mysqli_fetch_assoc($q3);
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard Sistem</title><link rel="stylesheet" href="style.css"></head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container" style="background: transparent; box-shadow: none; padding: 0;">
        <h2 style="color: #333;">Dashboard Overview</h2>
        <p style="color: #666;">Selamat datang kembali, <b><?php echo $_SESSION['nama']; ?></b>!</p>
        <div class="dashboard-grid">
            <div class="card" style="border-left-color: #4e73df;">
                <h3>Data Barang</h3> <p><?php echo $barang['total']; ?> Unit</p>
            </div>
            <div class="card" style="border-left-color: #1cc88a;">
                <h3>Total Transaksi</h3> <p><?php echo $transaksi['total']; ?>x Transaksi</p>
            </div>
            <div class="card" style="border-left-color: #f6c23e;">
                <h3>Total Pendapatan</h3> <p>Rp <?php echo number_format($pendapatan['total']); ?></p>
            </div>
            <div class="card" style="border-left-color: #36b9cc;">
                <h3>Level Akses</h3> <p><?php echo ($_SESSION['level'] == 1) ? "Administrator" : "Staff User"; ?></p>
            </div>
        </div>
    </div>
</body>
</html>