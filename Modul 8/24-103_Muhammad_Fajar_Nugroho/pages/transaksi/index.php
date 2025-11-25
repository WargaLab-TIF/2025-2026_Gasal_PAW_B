<?php
session_start();
require_once '../../koneksi.php';

$dari_tanggal = isset($_GET['dari_tanggal']) ? $_GET['dari_tanggal'] : '';
$sampai_tanggal = isset($_GET['sampai_tanggal']) ? $_GET['sampai_tanggal'] : '';
$cari_nota = isset($_GET['cari_nota']) ? trim($_GET['cari_nota']) : '';

if (!empty($dari_tanggal) && !empty($sampai_tanggal) && $dari_tanggal > $sampai_tanggal) {
    $sementara = $dari_tanggal;
    $dari_tanggal = $sampai_tanggal;
    $sampai_tanggal = $sementara;
}

if ($dari_tanggal && !$sampai_tanggal) { $sampai_tanggal = $dari_tanggal; }
if ($sampai_tanggal && !$dari_tanggal) { $dari_tanggal = $sampai_tanggal; }

$bagian_join = " FROM nota_detail nd
              JOIN nota n ON nd.nota_id = n.id
              LEFT JOIN barang b ON nd.barang_id = b.id";

$sql_dasar = "SELECT n.id AS nota_id, n.no_nota, n.tanggal, b.kode_barang, b.nama_barang, nd.qty, nd.harga, nd.subtotal" . $bagian_join;
$sql_ringkasan = "SELECT COUNT(DISTINCT n.id) AS total_nota, COALESCE(SUM(nd.qty),0) AS total_qty, COALESCE(SUM(nd.subtotal),0) AS total_pendapatan" . $bagian_join;
$sql_urut = " ORDER BY n.tanggal DESC, n.no_nota DESC, b.nama_barang ASC";

$syarat = [];
$param = '';
$nilai_param = [];

if ($dari_tanggal && $sampai_tanggal) {
    $syarat[] = "DATE(n.tanggal) BETWEEN ? AND ?";
    $param .= 'ss';
    $nilai_param[] = $dari_tanggal;
    $nilai_param[] = $sampai_tanggal;
}

if ($cari_nota !== '') {
    $syarat[] = "n.no_nota LIKE ?";
    $param .= 's';
    $nilai_param[] = '%'.$cari_nota.'%';
}

$where = $syarat ? (' WHERE '.implode(' AND ', $syarat)) : '';

$sql_transaksi = $sql_dasar . $where . $sql_urut;
$sql_total = $sql_ringkasan . $where;

$hasil = false;
$pernyataan = mysqli_prepare($koneksi, $sql_transaksi);
if ($pernyataan) {
    if ($param !== '') { mysqli_stmt_bind_param($pernyataan, $param, ...$nilai_param); }
    mysqli_stmt_execute($pernyataan);
    $hasil = mysqli_stmt_get_result($pernyataan);
}

$data_transaksi = [];
$jumlah_pendapatan = 0;
$jumlah_qty = 0;
$daftar_nota = [];

if ($hasil) {
    while ($baris = mysqli_fetch_assoc($hasil)) {
        $data_transaksi[] = $baris;
        $jumlah_pendapatan += (int)($baris['subtotal'] ?? 0);
        $jumlah_qty += (int)($baris['qty'] ?? 0);
        if (isset($baris['nota_id'])) { $daftar_nota[$baris['nota_id']] = true; }
    }
}

$jumlah_baris = count($data_transaksi);
$jumlah_nota = count($daftar_nota);

$jumlah_pendapatan_ringkas = null;
$jumlah_qty_ringkas = null;
$jumlah_nota_ringkas = null;

if ($sql_total) {
    $stmt_total = mysqli_prepare($koneksi, $sql_total);
    if ($stmt_total) {
        if ($param !== '') { mysqli_stmt_bind_param($stmt_total, $param, ...$nilai_param); }
        mysqli_stmt_execute($stmt_total);
        $hasil_total = mysqli_stmt_get_result($stmt_total);
        if ($hasil_total) { $ringkasan = mysqli_fetch_assoc($hasil_total); }
    }
}

if (isset($ringkasan) && $ringkasan) {
    $jumlah_nota_ringkas = isset($ringkasan['total_nota']) ? (int)$ringkasan['total_nota'] : 0;
    $jumlah_qty_ringkas = isset($ringkasan['total_qty']) ? (int)$ringkasan['total_qty'] : 0;
    $jumlah_pendapatan_ringkas = isset($ringkasan['total_pendapatan']) ? (int)$ringkasan['total_pendapatan'] : 0;
}

if ($jumlah_nota_ringkas !== null) { $jumlah_nota = $jumlah_nota_ringkas; }
if ($jumlah_qty_ringkas !== null) { $jumlah_qty = $jumlah_qty_ringkas; }
if ($jumlah_pendapatan_ringkas !== null) { $jumlah_pendapatan = $jumlah_pendapatan_ringkas; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @media print { .no-print { display: none !important; } }
    </style>
</head>
<body class="p-4">
<?php include '../../layouts/header.php'; ?>

<div class="container-fluid mt-3">
    <div class="card mb-3 no-print bg-light">
        <div class="card-body p-2">
            <form action="index.php" method="GET" class="d-flex align-items-center gap-2">
                <input type="date" name="dari_tanggal" class="form-control w-auto" value="<?php echo htmlspecialchars($dari_tanggal); ?>">
                <input type="date" name="sampai_tanggal" class="form-control w-auto" value="<?php echo htmlspecialchars($sampai_tanggal); ?>">
                <input type="text" name="cari_nota" class="form-control w-auto" placeholder="Cari No Nota" value="<?php echo htmlspecialchars($cari_nota); ?>">
                <button type="submit" class="btn btn-success">Filter</button>
                <a href="index.php" class="btn btn-outline-secondary">Reset</a>
            </form>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-between mb-2">
        <h5 class="mb-0">Data Transaksi <?php echo ($dari_tanggal && $sampai_tanggal) ? (htmlspecialchars($dari_tanggal).' - '.htmlspecialchars($sampai_tanggal)) : ''; ?><?php echo $cari_nota !== '' ? ' &bull; Nota: '.htmlspecialchars($cari_nota) : ''; ?></h5>
        <div class="d-flex flex-wrap gap-2">
            <span class="badge bg-primary">Total Nota: <?php echo $jumlah_nota; ?></span>
            <span class="badge bg-info text-dark">Jumlah Barang Terjual: <?php echo number_format($jumlah_qty, 0, ',', '.'); ?></span>
            <span class="badge bg-success">Total Pendapatan: <?php echo 'Rp. '.number_format($jumlah_pendapatan, 0, ',', '.'); ?></span>
        </div>
    </div>

    <?php if (!$hasil): ?>
        <div class="alert alert-warning">Data transaksi belum dapat diambil. Pastikan tabel <code>nota</code>, <code>nota_detail</code>, dan <code>barang</code> sudah tersedia.</div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-sm mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>No Nota</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($data_transaksi): ?>
                            <?php $no = 1; foreach ($data_transaksi as $baris): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo isset($baris['tanggal']) && $baris['tanggal'] !== null ? htmlspecialchars(date('d M Y', strtotime((string)$baris['tanggal']))) : '-'; ?></td>
                                    <td><?php echo htmlspecialchars($baris['no_nota'] ?? ''); ?></td>
                                    <td><?php echo htmlspecialchars($baris['kode_barang'] ?? '-'); ?></td>
                                    <td><?php echo htmlspecialchars($baris['nama_barang'] ?? '-'); ?></td>
                                    <td class="text-end"><?php echo number_format((int)($baris['qty'] ?? 0), 0, ',', '.'); ?></td>
                                    <td class="text-end"><?php echo 'Rp. '.number_format((int)($baris['harga'] ?? 0), 0, ',', '.'); ?></td>
                                    <td class="text-end"><?php echo 'Rp. '.number_format((int)($baris['subtotal'] ?? 0), 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data transaksi untuk rentang ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../../layouts/footer.php'; ?>
</body>
</html>
