<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    die("ID transaksi tidak ditemukan.");
}

$id = $_GET['id'];

// Ambil data transaksi (master)
$transaksi = $conn->query("
    SELECT t.*, p.nama AS nama_pelanggan 
    FROM transaksi t 
    JOIN pelanggan p ON t.pelanggan_id = p.id 
    WHERE t.id = $id
")->fetch_assoc();

// Ambil detail barang
$detail = $conn->query("
    SELECT d.*, b.nama_barang 
    FROM transaksi_detail d 
    JOIN barang b ON d.barang_id = b.id 
    WHERE d.transaksi_id = $id
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { margin: 30px; font-family: 'Arial'; }
        .nota { max-width: 600px; margin: auto; border: 1px solid #ddd; padding: 20px; border-radius: 10px; }
        .nota h3 { text-align: center; margin-bottom: 20px; }
        .table th, .table td { padding: 5px; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
<div class="nota">
    <h3>Nota Transaksi</h3>
    <p><strong>Tanggal:</strong> <?= date('d-m-Y', strtotime($transaksi['waktu_transaksi'])) ?></p>
    <p><strong>Pelanggan:</strong> <?= htmlspecialchars($transaksi['nama_pelanggan']) ?></p>
    <p><strong>Keterangan:</strong> <?= htmlspecialchars($transaksi['keterangan']) ?></p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $grand_total = 0;
            while ($r = $detail->fetch_assoc()) {
                $subtotal = $r['harga'] * $r['qty'];
                $grand_total += $subtotal;
                echo "<tr>
                        <td>{$r['nama_barang']}</td>
                        <td>Rp " . number_format($r['harga'], 0, ',', '.') . "</td>
                        <td>{$r['qty']}</td>
                        <td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
                      </tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-end">Total:</th>
                <th>Rp <?= number_format($grand_total, 0, ',', '.') ?></th>
            </tr>
        </tfoot>
    </table>

    <p class="text-center mt-3">Terima kasih telah berbelanja!</p>
    <div class="text-center no-print">
        <button class="btn btn-success" onclick="window.print()">🖨 Cetak Nota</button>
        <a href="transaksi.php" class="btn btn-secondary">Kembali</a>
    </div>
</div>
</body>
</html>
