<?php
require_once "koneksi.php";

// Ambil data nota beserta detail barangnya
$sql = "
    SELECT 
        n.id AS nota_id,
        n.no_nota,
        n.tanggal,
        n.pelanggan_id,
        n.total_harga,
        td.barang_id,
        b.nama_barang,
        td.harga,
        td.qty,
        (td.harga * td.qty) AS subtotal
    FROM nota n
    JOIN transaksi_detail td ON n.id = td.nota_id
    JOIN barang b ON td.barang_id = b.id
    ORDER BY n.id DESC, td.barang_id ASC
";


$result = mysqli_query($conn, $sql);

// Simpan hasil dalam struktur array biar mudah di-loop
$notas = [];
while ($row = mysqli_fetch_assoc($result)) {
    $notas[$row['nota_id']]['info'] = [
        'no_nota' => $row['no_nota'],
        'tanggal' => $row['tanggal'],
        'pelanggan_id' => $row['pelanggan_id'],
        'total_harga' => $row['total_harga'],
    ];
    $notas[$row['nota_id']]['detail'][] = [
        'barang_id' => $row['barang_id'],
        'nama_barang' => $row['nama_barang'],
        'harga' => $row['harga'],
        'qty' => $row['qty'],
        'subtotal' => $row['subtotal']
    ];
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Nota Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 6px;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
        }

        .total {
            font-weight: bold;
            text-align: right;
        }

        .sub-header {
            background: #e9e9e9;
            font-weight: bold;
        }

        a.btn {
            background: #007bff;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        a.btn:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

    <h2>Daftar Nota & Detail Transaksi</h2>

    <a href="nota_create.php" class="btn">+ Tambah Transaksi Baru</a>
    <br><br>

    <?php if (empty($notas)) : ?>
        <p><em>Belum ada data transaksi.</em></p>
    <?php else: ?>
        <?php foreach ($notas as $id_nota => $nota) : ?>
            <table>
                <tr class="sub-header">
                    <td colspan="5">
                        <strong>No Nota:</strong> <?= htmlspecialchars($nota['info']['no_nota']) ?> |
                        <strong>Tanggal:</strong> <?= htmlspecialchars($nota['info']['tanggal']) ?> |
                        <strong>ID Pelanggan:</strong> <?= htmlspecialchars($nota['info']['pelanggan_id']) ?>
                    </td>
                </tr>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
                <?php foreach ($nota['detail'] as $det) : ?>
                    <tr>
                        <td><?= htmlspecialchars($det['barang_id']) ?></td>
                        <td><?= htmlspecialchars($det['nama_barang']) ?></td>
                        <td> <?= $det['harga'] ?></td>
                        <td><?= htmlspecialchars($det['qty']) ?></td>
                        <td> <?= $det['subtotal'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="total">Total Harga:</td>
                    <td class="total"> <?= number_format($nota['info']['total_harga'], 0, ',', '.') ?></td>
                </tr>
            </table>
        <?php endforeach; ?>
    <?php endif; ?>

</body>

</html>

