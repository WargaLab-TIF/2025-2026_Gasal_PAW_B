<?php
session_start();
include 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: form_transaksi.php');
    exit;
}

$id_nota = $_GET['id'];

// Ambil Data Master Nota
$query_nota = "SELECT nota.*, pelanggan.nama AS nama_pelanggan, user.nama AS nama_kasir 
               FROM nota 
               JOIN pelanggan ON nota.id_pelanggan = pelanggan.id 
               JOIN user ON nota.id_user = user.id_user 
               WHERE nota.id_nota = ?";

$stmt_nota = mysqli_prepare($koneksi, $query_nota);
mysqli_stmt_bind_param($stmt_nota, "s", $id_nota);
mysqli_stmt_execute($stmt_nota);
$result_nota = mysqli_stmt_get_result($stmt_nota);
$nota = mysqli_fetch_assoc($result_nota);

if (!$nota) {
    $_SESSION['message'] = "Nota tidak ditemukan!";
    $_SESSION['message_type'] = "danger";
    header('Location: form_transaksi.php');
    exit;
}

// Ambil Data Detail Item
$query_items = "SELECT item_nota.*, barang.nama_barang 
                FROM item_nota 
                JOIN barang ON item_nota.id_barang = barang.id 
                WHERE item_nota.id_nota = ?";
                
$stmt_items = mysqli_prepare($koneksi, $query_items);
mysqli_stmt_bind_param($stmt_items, "s", $id_nota);
mysqli_stmt_execute($stmt_items);
$result_items = mysqli_stmt_get_result($stmt_items);

// Helper untuk format Rupiah
function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi <?php echo $id_nota; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="nota-container">
    <div class="nota-header">
        <h2>Bukti Transaksi</h2>
        <h3>Toko Komputer Anda</h3>
    </div>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?php echo $_SESSION['message_type']; ?>">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            ?>
        </div>
    <?php endif; ?>

    <div class="nota-info">
        <div>
            <strong>No. Nota:</strong> <?php echo $nota['id_nota']; ?><br>
            <strong>Waktu:</strong> <?php echo date("d-m-Y H:i:s", strtotime($nota['waktu_transaksi'])); ?>
        </div>
        <div>
            <strong>Pelanggan:</strong> <?php echo $nota['nama_pelanggan']; ?><br>
            <strong>Kasir:</strong> <?php echo $nota['nama_kasir']; ?>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $nomor = 1;
            while($item = mysqli_fetch_assoc($result_items)): ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $item['nama_barang']; ?></td>
                    <td><?php echo formatRupiah($item['harga_saat_transaksi']); ?></td>
                    <td><?php echo $item['qty']; ?></td>
                    <td><?php echo formatRupiah($item['subtotal']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <div class="nota-footer">
        <div>Total: <span><?php echo formatRupiah($nota['total_keseluruhan']); ?></span></div>
        <div>Bayar: <span><?php echo formatRupiah($nota['jumlah_bayar']); ?></span></div>
        <div>Kembalian: <span><?php echo formatRupiah($nota['kembalian']); ?></span></div>
    </div>

    <hr>
    <div style="text-align: center; margin-top: 20px;">
        <a href="form_transaksi.php" class="btn btn-primary">Buat Transaksi Baru</a>
    </div>
</div>

</body>
</html>