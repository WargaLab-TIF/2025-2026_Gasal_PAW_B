<?php
include 'koneksi.php';

$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$barangQuery = mysqli_query($conn, "SELECT * FROM barang");

$jumlah = $_POST['jumlah'] ?? 1;
$barang_id = $_POST['barang_id'] ?? [];
$qty = $_POST['qty'] ?? [];
$no_nota = $_POST['no_nota'] ?? '';
$pelanggan_id = $_POST['pelanggan_id'] ?? '';
$tanggal = $_POST['tanggal'] ?? '';

if (isset($_POST['tambah'])) $jumlah++;

$hasil = [];
$total = 0;
if (isset($_POST['hitung'])) {
    foreach ($barang_id as $i => $id) {
        if (!$id) continue;
        $b = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama_barang, harga FROM barang WHERE id=$id"));
        $subtotal = $b['harga'] * $qty[$i];
        $hasil[] = ['nama' => $b['nama_barang'], 'harga' => $b['harga'], 'qty' => $qty[$i], 'subtotal' => $subtotal];
        $total += $subtotal;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Form Transaksi</h2>

    <form method="post">
        No Nota: <input name="no_nota" value="<?= $no_nota ?>" required><br>
        Pelanggan:
        <select name="pelanggan_id" required>
            <option value="">-- Pilih --</option>
            <?php while ($p = mysqli_fetch_assoc($pelanggan)): ?>
                <option value="<?= $p['id'] ?>" <?= $p['id'] == $pelanggan_id ? 'selected' : '' ?>>
                    <?= $p['nama'] ?></option>
            <?php endwhile; ?>
        </select><br>
        Tanggal: <input type="date" name="tanggal" value="<?= $tanggal ?>" required><br><br>

        <table border="1" width="100%">
            <tr>
                <th>Barang</th>
                <th>Qty</th>
            </tr>
            <?php for ($i = 0; $i < $jumlah; $i++): ?>
                <tr>
                    <td>
                        <select name="barang_id[]">
                            <option value="">-- Pilih --</option>
                            <?php mysqli_data_seek($barangQuery, 0);
                            while ($b = mysqli_fetch_assoc($barangQuery)): ?>
                                <option value="<?= $b['id'] ?>" <?= ($barang_id[$i] ?? '') == $b['id'] ? 'selected' : '' ?>>
                                    <?= $b['nama_barang'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td><input type="number" name="qty[]" value="<?= $qty[$i] ?? 1 ?>" min="1"></td>
                </tr>
            <?php endfor; ?>
        </table>

        <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
        <button name="tambah">+ Barang</button>
        <button name="hitung">Hitung Total</button>
    </form>

    <?php if ($hasil): ?>
        <h3>Hasil</h3>
        <table border="1" width="100%">
            <tr>
                <th>Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
            <?php foreach ($hasil as $r): ?>
                <tr>
                    <td><?= $r['nama'] ?></td>
                    <td><?= number_format($r['harga']) ?></td>
                    <td><?= $r['qty'] ?></td>
                    <td><?= number_format($r['subtotal']) ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th colspan="3">TOTAL</th>
                <th><?= number_format($total) ?></th>
            </tr>
        </table>
        <form action="transaksi_simpan.php" method="post">
            <?php foreach (['no_nota', 'pelanggan_id', 'tanggal'] as $f): ?>
                <input type="hidden" name="<?= $f ?>" value="<?= $$f ?>">
            <?php endforeach; ?>
            <?php foreach ($barang_id as $i => $bid): ?>
                <input type="hidden" name="barang_id[]" value="<?= $bid ?>">
                <input type="hidden" name="qty[]" value="<?= $qty[$i] ?>">
            <?php endforeach; ?>
            <button>Simpan Transaksi</button>
        </form>
    <?php endif; ?>
</body>
</html>