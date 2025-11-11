
<?php
include 'koneksi.php';

$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$barangQuery = mysqli_query($conn, "SELECT * FROM barang");

$jumlah_baris = isset($_POST['jumlah_baris']) ? $_POST['jumlah_baris'] : 1;

$barang_id = $_POST['barang_id'] ?? [];
$qty = $_POST['qty'] ?? [];
$no_nota = $_POST['no_nota'] ?? '';
$pelanggan_id = $_POST['pelanggan_id'] ?? '';
$tanggal = $_POST['tanggal'] ?? '';

if (isset($_POST['tambah_baris'])) {
    $jumlah_baris++;
    $barang_id[] = '';  
    $qty[] = 1;
}

$hasil = [];
$total = 0;

if (isset($_POST['hitung'])) {
    for ($i = 0; $i < count($barang_id); $i++) {
        if ($barang_id[$i] == "") continue;

        $q = mysqli_query($conn, "SELECT nama_barang, harga FROM barang WHERE id = " . intval($barang_id[$i]));
        $d = mysqli_fetch_assoc($q);

        $nama = $d['nama_barang'];
        $harga = $d['harga'];
        $subtotal = $harga * $qty[$i];

        $hasil[] = [
            'nama' => $nama,
            'harga' => $harga,
            'qty' => $qty[$i],
            'subtotal' => $subtotal
        ];
        $total += $subtotal;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Transaksi</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Form Transaksi</h2>

<form method="post">
<label>No Nota:</label>
<input type="text" name="no_nota" value="<?= htmlspecialchars($no_nota); ?>" required><br><br>

<label>Pelanggan:</label> <br>
<select name="pelanggan_id" required>
  <option value="">-- Pilih Pelanggan --</option>
  <?php mysqli_data_seek($pelanggan, 0);
  while ($p = mysqli_fetch_assoc($pelanggan)): ?>
     <option value="<?= $p['id']; ?>" <?= ($pelanggan_id == $p['id']) ? 'selected' : ''; ?>>
         <?= $p['nama']; ?>
     </option>
  <?php endwhile; ?>
</select><br><br>

<label>Tanggal Transaksi:</label>
<input type="date" name="tanggal" value="<?= htmlspecialchars($tanggal); ?>" required><br><br>

<h3>Detail Barang</h3>
<table width="100%">
  <tr>
    <th>Barang</th>
    <th>Qty</th>
  </tr>

  <?php for ($i = 0; $i < $jumlah_baris; $i++): ?>
  <tr>
    <td>
      <select name="barang_id[]">
        <option value="">-- Pilih --</option>
        <?php
        mysqli_data_seek($barangQuery, 0);
        while ($b = mysqli_fetch_assoc($barangQuery)):
            $selected = ($barang_id[$i] ?? '') == $b['id'] ? 'selected' : '';
        ?>
            <option value="<?= $b['id']; ?>" <?= $selected; ?>><?= $b['nama_barang']; ?></option>
        <?php endwhile; ?>
      </select>
    </td>
    <td><input type="number" name="qty[]" min="1" value="<?= $qty[$i] ?? 1; ?>"></td>
  </tr>
  <?php endfor; ?>
</table>

<input type="hidden" name="jumlah_baris" value="<?= $jumlah_baris; ?>">

<button type="submit" name="tambah_baris" class="submit">+ Tambah Barang</button>
<button type="submit" name="hitung" class="submit" style="background:#28a745;">Hitung Total</button>
</form>

<?php if (!empty($hasil)): ?>
<h3>Hasil Perhitungan</h3>
<table width="100%">
<tr>
    <th>Barang</th>
    <th>Harga</th>
    <th>Qty</th>
    <th>Subtotal</th>
</tr>
<?php foreach($hasil as $row): ?>
<tr>
    <td><?= $row['nama']; ?></td>
    <td><?= number_format($row['harga']); ?></td>
    <td><?= $row['qty']; ?></td>
    <td><?= number_format($row['subtotal']); ?></td>
</tr>
<?php endforeach; ?>
<tr>
    <th colspan="3">TOTAL</th>
    <th><?= number_format($total); ?></th>
</tr>
</table>

<form action="transaksi_simpan.php" method="post">
    <input type="hidden" name="no_nota" value="<?= htmlspecialchars($no_nota); ?>">
    <input type="hidden" name="pelanggan_id" value="<?= htmlspecialchars($pelanggan_id); ?>">
    <input type="hidden" name="tanggal" value="<?= htmlspecialchars($tanggal); ?>">
    <?php foreach ($barang_id as $bid): ?>
        <input type="hidden" name="barang_id[]" value="<?= htmlspecialchars($bid); ?>">
    <?php endforeach; ?>
    <?php foreach ($qty as $q): ?>
        <input type="hidden" name="qty[]" value="<?= htmlspecialchars($q); ?>">
    <?php endforeach; ?>
    <button type="submit" class="submit">Simpan Transaksi</button>
</form>
<?php endif; ?>

</div>
</body>
</html>
