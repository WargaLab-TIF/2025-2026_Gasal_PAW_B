<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../../koneksi.php';
$nama = $_SESSION['nama'] ?? $SESSION['username'];

$counts = [
    'barang' => null,
    'supplier' => null,
    'transaksi' => null,
];
foreach ($counts as $table => $_) {
    $res = @mysqli_query($koneksi, "SELECT COUNT(*) AS c FROM `$table`");
    if ($res) {
        $row = mysqli_fetch_assoc($res);
        $counts[$table] = (int)($row['c'] ?? 0);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="p-4">
<?php include '../../layouts/header.php'; ?>

<div class="container-fluid mt-3">
    <div class="row mb-3">
        <div class="col">
            <div class="p-3 bg-light border rounded">
                <h5 class="mb-1">Selamat datang, <?php echo $nama; ?>!</h5>
                <p class="mb-0 text-muted">Sistem Penjualan - Beranda</p>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted">Barang</div>
                            <div class="fs-4 fw-bold"><?php echo $counts['barang'] !== null ? (int)$counts['barang'] : '-'; ?></div>
                        </div>
                        <i class="fa-solid fa-box fs-2 text-primary"></i>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="/pages/barang/" class="btn btn-sm btn-primary w-100">Lihat Barang</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted">Supplier</div>
                            <div class="fs-4 fw-bold"><?php echo $counts['supplier'] !== null ? (int)$counts['supplier'] : '-'; ?></div>
                        </div>
                        <i class="fa-solid fa-truck fs-2 text-success"></i>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="/pages/supplier/" class="btn btn-sm btn-success w-100">Lihat Supplier</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted">Transaksi</div>
                            <div class="fs-4 fw-bold"><?php echo $counts['transaksi'] !== null ? (int)$counts['transaksi'] : '-'; ?></div>
                        </div>
                        <i class="fa-solid fa-cash-register fs-2 text-warning"></i>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="/pages/transaksi/" class="btn btn-sm btn-warning w-100">Lihat Transaksi</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted">Laporan</div>
                            <div class="fs-4 fw-bold">&nbsp;</div>
                        </div>
                        <i class="fa-solid fa-chart-column fs-2 text-info"></i>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="/pages/laporan/" class="btn btn-sm btn-info w-100 text-white">Lihat Laporan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../layouts/footer.php'; ?>
</body>
</html>
