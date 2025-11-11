<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Transaksi Penjualan</title>
</head>
<body>

<h2>Form Transaksi Penjualan</h2>

<form action="transaksi_simpan.php" method="POST">
  <label>Nama Pelanggan:</label><br>
  <input type="text" name="nama_pelanggan" required><br><br>

  <label>Tanggal Transaksi:</label><br>
  <input type="date" name="tanggal" required><br><br>

  <h3>Detail Barang</h3>
  <table border="1" cellpadding="5" id="tabelBarang">
    <tr>
      <th>Nama Barang</th>
      <th>Qty</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
    <tr>
      <td><input type="text" name="nama_barang[]" required></td>
      <td><input type="number" name="qty[]" min="1" required></td>
      <td><input type="number" name="harga[]" min="0" step="0.01" required></td>
      <td><button type="button" onclick="hapusBaris(this)">Hapus</button></td>
    </tr>
  </table>

  <br>
  <button type="button" onclick="tambahBaris()">Tambah Barang</button><br><br>
  <button type="submit">Simpan Transaksi</button>
</form>

<script>
function tambahBaris() {
  const tabel = document.getElementById("tabelBarang");
  const row = tabel.insertRow();
  row.innerHTML = `
    <td><input type="text" name="nama_barang[]" required></td>
    <td><input type="number" name="qty[]" min="1" required></td>
    <td><input type="number" name="harga[]" min="0" step="0.01" required></td>
    <td><button type="button" onclick="hapusBaris(this)">Hapus</button></td>`;
}

function hapusBaris(btn) {
  btn.closest("tr").remove();
}
</script>

</body>
</html>