<?php 
include '../config.php'; 
include 'header.php'; 
include '../auth.php';// Pastikan header memuat CSS Bootstrap

// --- LOGIKA DATA STATISTIK ---

// 1. Total Pendapatan (Omzet)
$query_omzet = mysqli_query($conn, "SELECT SUM(total) AS total_uang FROM transaksi");
$data_omzet  = mysqli_fetch_assoc($query_omzet);
$omzet       = $data_omzet['total_uang'];

// 2. Jumlah Transaksi
$query_trx   = mysqli_query($conn, "SELECT COUNT(*) AS total_trx FROM transaksi");
$data_trx    = mysqli_fetch_assoc($query_trx);
$total_trx   = $data_trx['total_trx'];

// 3. Jumlah Pelanggan
$query_cust  = mysqli_query($conn, "SELECT COUNT(*) AS total_cust FROM pelanggan");
$data_cust   = mysqli_fetch_assoc($query_cust);
$total_cust  = $data_cust['total_cust'];

// 4. Jumlah Barang & Cek Stok Kritis
$query_brg   = mysqli_query($conn, "SELECT COUNT(*) AS total_brg FROM barang");
$data_brg    = mysqli_fetch_assoc($query_brg);
$total_brg   = $data_brg['total_brg'];

// 5. Ambil Barang yang Stoknya Menipis (< 20)
$query_stok  = mysqli_query($conn, "SELECT * FROM barang WHERE stok <= 20 ORDER BY stok ASC LIMIT 5");
?>

<div class="content container-fluid p-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard Overview</h2>
        <span class="text-muted">Update: <?= date('d M Y') ?></span>
    </div>

    <div class="row g-3 mb-4">
        
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card text-white bg-primary h-100 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-uppercase mb-2 opacity-75">Total Pendapatan</h6>
                    <h3 class="fw-bold mb-0">Rp <?= number_format($omzet, 0, ',', '.') ?></h3>
                    <small class="opacity-50">Seumur hidup</small>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card text-white bg-success h-100 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-uppercase mb-2 opacity-75">Total Transaksi</h6>
                    <h3 class="fw-bold mb-0"><?= number_format($total_trx) ?></h3>
                    <small class="opacity-50">Order berhasil</small>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card text-white bg-warning h-100 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-uppercase mb-2 opacity-75 text-dark">Pelanggan</h6>
                    <h3 class="fw-bold mb-0 text-dark"><?= number_format($total_cust) ?></h3>
                    <small class="text-dark opacity-50">Orang terdaftar</small>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card text-white bg-info h-100 shadow-sm">
                <div class="card-body">
                    <h6 class="card-title text-uppercase mb-2 opacity-75">Total Produk</h6>
                    <h3 class="fw-bold mb-0"><?= number_format($total_brg) ?></h3>
                    <small class="opacity-50">Jenis barang</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-danger h-100">
                <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">⚠️ Peringatan Stok Menipis (<= 20)</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 align-middle">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th class="text-center">Sisa Stok</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(mysqli_num_rows($query_stok) > 0): ?>
                                    <?php while($s = mysqli_fetch_assoc($query_stok)): ?>
                                    <tr>
                                        <td><?= $s['nama_barang'] ?></td>
                                        <td class="text-center fw-bold text-danger"><?= $s['stok'] ?></td>
                                        <td><span class="badge bg-danger">Restock!</span></td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr><td colspan="3" class="text-center p-3">Aman! Tidak ada stok kritis.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-light">
                    <h6 class="mb-0">Pintasan Cepat</h6>
                </div>
                <div class="card-body">
                    <p>Apa yang ingin Anda lakukan sekarang?</p>
                    <div class="d-grid gap-2 col-md-8 mx-auto">
                        <a href="transkasi/tambah.php" class="btn btn-primary">
                            + Buat Transaksi Baru
                        </a>
                        <a href="barang/index.php" class="btn btn-outline-secondary">
                            Lihat Data Barang
                        </a>
                        <a href="laporan.php" class="btn btn-outline-success">
                            Buka Laporan Grafik
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>