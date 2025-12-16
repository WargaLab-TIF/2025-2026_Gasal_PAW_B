<?php
include 'config.php';
include '../header.php';
include '../../auth.php';

// Validasi ID
if (!isset($_GET['id'])) {
    die("<div class='alert alert-danger'>ID transaksi tidak ditemukan.</div>");
}

$id = intval($_GET['id']);

// Ambil data transaksi
$qTrans = mysqli_query(
    $conn,
    "SELECT t.*, p.nama AS pelanggan 
 FROM transaksi t 
 JOIN pelanggan p ON p.id = t.pelanggan_id
 WHERE t.id = $id"
);

if (!$qTrans) {
    die("Query Error: " . mysqli_error($conn));
}

$t = mysqli_fetch_assoc($qTrans);

if (!$t) {
    die("<div class='alert alert-warning'>Transaksi tidak ditemukan.</div>");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detail Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="p-4">

    <div class="container">

        <h3 class="mb-3">Detail Transaksi #<?= $id ?></h3>

        <table class="table table-striped w-50">
            <tr>
                <th>Pelanggan</th>
                <td><?= $t['pelanggan'] ?></td>
            </tr>
            <tr>
                <th>Waktu</th>
                <td><?= $t['waktu_transaksi'] ?></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><?= $t['keterangan'] ?></td>
            </tr>
            <tr class="table-success">
                <th>Total</th>
                <td><strong>Rp <?= number_format($t['total']) ?></strong></td>
            </tr>
        </table>

        <a href="edit.php?id=<?= $id ?>" class="btn btn-warning mb-4">✏ Edit Transaksi</a>
        <hr>
        </tbody>
        </table>

    </div>
</body>

</html>