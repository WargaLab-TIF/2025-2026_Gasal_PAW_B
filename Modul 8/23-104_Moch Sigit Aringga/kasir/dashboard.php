<?php 
include '../config.php';
include 'header.php';
include '../auth.php'; // Pastikan header memuat navbar kasir

// --- LOGIKA PHP KHUSUS KASIR ---

// 1. Set Tanggal Hari Ini (Penting untuk Kasir)
$hari_ini = date('Y-m-d');

// 2. Hitung Omzet & Transaksi HARI INI
$q_today = mysqli_query($conn, "SELECT COUNT(*) AS jum_trx, SUM(total) AS omzet 
                                FROM transaksi 
                                WHERE DATE(waktu_transaksi) = '$hari_ini'");
$d_today = mysqli_fetch_assoc($q_today);
$omzet_today = $d_today['omzet'] ? $d_today['omzet'] : 0;
$trx_today   = $d_today['jum_trx'];

// 3. Ambil 5 Transaksi Terakhir (Hanya Hari Ini)
$q_recent = mysqli_query($conn, "SELECT t.*, p.nama AS pelanggan 
                                 FROM transaksi t 
                                 LEFT JOIN pelanggan p ON p.id = t.pelanggan_id 
                                 WHERE DATE(t.waktu_transaksi) = '$hari_ini'
                                 ORDER BY t.id DESC LIMIT 5");
?>

<style>
    /* Styling Khusus Dashboard Kasir */
    .btn-jumbo {
        padding: 2rem;
        font-size: 1.2rem;
        font-weight: bold;
        transition: transform 0.2s;
        border: none;
        box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
    }
    .btn-jumbo:hover {
        transform: translateY(-3px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
    }
    .bg-gradient-info {
        background: linear-gradient(87deg, #11cdef 0, #1171ef 100%) !important;
    }
    .bg-gradient-success {
        background: linear-gradient(87deg, #2dce89 0, #2dcecc 100%) !important;
    }
    .card-stats .card-body {
        padding: 1rem 1.5rem;
    }
    .icon-shape {
        width: 48px; height: 48px;
        display: flex; align-items: center; justify-content: center;
        border-radius: 50%; color: white; font-size: 1.5rem;
    }
</style>

<div class="container mt-4 mb-5">

    <div class="row mb-4">
        <div class="col-12">
            <h3 class="fw-bold text-dark">Halo, Kasir! 👋</h3>
            <p class="text-muted">Siap melayani pelanggan hari ini? Berikut ringkasan shift Anda.</p>
        </div>
    </div>

    <div class="row mb-4 g-3">
        <div class="col-xl-6 col-md-6">
            <div class="card card-stats mb-4 mb-xl-0 border-0 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Pendapatan Hari Ini</h5>
                            <span class="h2 font-weight-bold mb-0 text-dark">Rp <?= number_format($omzet_today, 0, ',', '.') ?></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape bg-gradient-success shadow">
                                <i class="bi bi-cash-stack"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-success mr-2"><i class="bi bi-calendar-check"></i> <?= date('d M Y') ?></span>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-xl-6 col-md-6">
            <div class="card card-stats mb-4 mb-xl-0 border-0 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Transaksi</h5>
                            <span class="h2 font-weight-bold mb-0 text-dark"><?= $trx_today ?> <small class="fs-6 text-muted">Nota</small></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon-shape bg-gradient-info shadow">
                                <i class="bi bi-receipt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                        <span class="text-info mr-2"><i class="bi bi-people-fill"></i> Pelanggan dilayani</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-8 mb-3">
            <a href="tambah_transaksi.php" class="btn btn-primary w-100 btn-jumbo d-flex align-items-center justify-content-center text-white text-decoration-none">
                <i class="bi bi-cart-plus-fill me-3 fs-1"></i> 
                <div class="text-start">
                    <div class="fs-4">TRANSAKSI BARU</div>
                    <small class="fw-normal opacity-75">Buat penjualan baru (Tekan F2)</small>
                </div>
            </a>
        </div>
        <div class="col-lg-4 mb-3">
            <a href="#" class="btn btn-light border w-100 btn-jumbo d-flex align-items-center justify-content-center text-dark text-decoration-none bg-white">
                <i class="bi bi-box-seam me-3 fs-2 text-secondary"></i> 
                <div class="text-start">
                    <div class="fs-5">semangat kerja</div>
                    <small class="text-muted">🖐️🖐️🖐️</small>
                </div>
            </a>
        </div>
    </div>

    <div class="row">
        
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="mb-0 fw-bold">Riwayat Transaksi Terakhir (Hari Ini)</h6>
                        </div>
                        <div class="col text-end">
                            <a href="transaksi.php" class="btn btn-sm btn-primary">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="small text-muted">Jam</th>
                                <th scope="col" class="small text-muted">Pelanggan</th>
                                <th scope="col" class="small text-muted text-end">Total</th>
                                <th scope="col" class="small text-muted text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($q_recent) > 0): ?>
                                <?php while($r = mysqli_fetch_assoc($q_recent)): ?>
                                <tr>
                                    <td class="fw-bold text-dark"><?= date('H:i', strtotime($r['waktu_transaksi'])) ?></td>
                                    <td><?= htmlspecialchars($r['pelanggan']) ?></td>
                                    <td class="text-end text-success fw-bold">Rp <?= number_format($r['total']) ?></td>
                                    <td class="text-center"><span class="badge bg-success bg-opacity-10 text-success">Selesai</span></td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada penjualan hari ini. Semangat!</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 h-100 bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-search me-2"></i>Cek Harga Cepat</h5>
                    <p class="small opacity-75">Cari nama barang atau kode untuk melihat harga tanpa membuka menu barang.</p>
                    
                    <form action="data_barang.php" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="cari" class="form-control" placeholder="Scan Barcode / Ketik..." autofocus>
                            <button class="btn btn-light text-primary" type="submit">Cari</button>
                        </div>
                    </form>
                    
                    <hr class="border-light opacity-25">
                    <div class="small">
                        <i class="bi bi-info-circle me-1"></i> Info Shift:<br>
                        Kasir: <strong><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Admin'; ?></strong><br>
                        Login: <?= date('H:i') ?> WIB
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>