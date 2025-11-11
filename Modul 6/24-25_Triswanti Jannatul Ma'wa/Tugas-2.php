<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pelanggan = $_POST['id_pelanggan'];
    $tanggal      = $_POST['tanggal'];
    $produk       = $_POST['id_produk'];
    $jumlah       = $_POST['jumlah'];

    $total = 0;
    $subtotals = [];

    for ($i = 0; $i < count($produk); $i++) {
        $idp = $produk[$i];
        $jml = $jumlah[$i];

        $qHarga = mysqli_query($cont, "SELECT harga FROM produk WHERE id_produk = '$idp'");
        $dHarga = mysqli_fetch_assoc($qHarga);
        $sub = $dHarga['harga'] * $jml;

        $subtotals[] = $sub;
        $total += $sub;
    }

    mysqli_query($cont, "INSERT INTO transaksi (id_pelanggan, tanggal_transaksi, total, status)
                         VALUES ('$id_pelanggan', '$tanggal', '$total', 'Selesai')");
    $id_transaksi = mysqli_insert_id($cont);

    for ($i = 0; $i < count($produk); $i++) {
        $idp = $produk[$i];
        $jml = $jumlah[$i];
        $sub = $subtotals[$i];

        mysqli_query($cont, "INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah, subtotal)
                             VALUES ('$id_transaksi', '$idp', '$jml', '$sub')");
    }

    $qTrans = mysqli_query($cont, "
        SELECT t.*, p.nama, p.alamat, p.no_telp
        FROM transaksi t
        JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
        WHERE t.id_transaksi = '$id_transaksi'
    ");
    $trans = mysqli_fetch_assoc($qTrans);

    $qDetail = mysqli_query($cont, "
        SELECT d.*, pr.nama_produk, pr.harga
        FROM detail_transaksi d
        JOIN produk pr ON d.id_produk = pr.id_produk
        WHERE d.id_transaksi = '$id_transaksi'
    ");
    ?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <title>Nota Belanja</title>
        <style>
        body { font-family: Arial; margin: 40px; }
        table { border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        </style>
    </head>
    <body>
        <h2>Nota Belanja</h2>
        <p>
        <strong>No. Transaksi:</strong> <?= $trans['id_transaksi'] ?><br>
        <strong>Nama Pelanggan:</strong> <?= $trans['nama'] ?><br>
        <strong>Tanggal:</strong> <?= $trans['tanggal_transaksi'] ?><br>
        <strong>Alamat:</strong> <?= $trans['alamat'] ?><br>
        <strong>No. Telp:</strong> <?= $trans['no_telp'] ?>
        </p>
        <table>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
            <?php while ($d = mysqli_fetch_assoc($qDetail)) { ?>
            <tr>
                <td><?= $d['nama_produk'] ?></td>
                <td>Rp<?= number_format($d['harga'],0,',','.') ?></td>
                <td><?= $d['jumlah'] ?></td>
                <td>Rp<?= number_format($d['subtotal'],0,',','.') ?></td>
            </tr>
            <?php } ?>
        </table>

        <h3>Total: Rp<?= number_format($trans['total'],0,',','.') ?></h3>

        <br>
        <a href="Tugas-1.php">← Kembali ke Form Transaksi</a>
    </body>
</html>

<?php } ?>
