<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Transaksi</title>
</head>
<body>

<div class="container">
    <h2>Input Transaksi Statik</h2>
    <form action="proses_simpan.php" method="POST">

        <h3>Data Nota (Master)</h3>
        <label for="tanggal_nota">Tanggal Nota:</label>
        <input type="date" id="tanggal_nota" name="tanggal_nota" value="<?php echo date('Y-m-d'); ?>" required>
        
        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" required>
        
        <hr>

        <h3>Detail Barang (Maksimal 3 Item)</h3>
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <td>
                        <input type="text" name="nama_barang[]" placeholder="Barang <?php echo $i + 1; ?>">
                    </td>
                    <td>
                        <input type="number" step="0.01" min="0" name="harga_satuan[]" value="0">
                    </td>
                    <td>
                        <input type="number" min="0" name="jumlah[]" value="0">
                    </td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <button type="submit" style="padding: 10px 20px;">Simpan Transaksi</button>
    </form>
</div>

</body>
</html>