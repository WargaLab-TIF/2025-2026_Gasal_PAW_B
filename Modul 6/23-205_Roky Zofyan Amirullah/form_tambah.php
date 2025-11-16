<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi Baru</title>
    <style>
        .detail-item { margin-bottom: 10px; padding: 5px; border: 1px solid #ccc; }
        .detail-item input { margin-right: 5px; }
        #detail_barang_container { margin-top: 15px; }
    </style>
</head>
<body>

    <h1>Form Transaksi Baru </h1>
    <form action="proses_tambah.php" method="POST">
        
        <h3>Data Master </h3>
        <div>
            <label>No. Nota:</label>
            <input type="text" name="no_nota" required>
        </div>
        <div style="margin-top: 10px;">
            <label>Tanggal:</label>
            <input type="date" name="tanggal" required>
        </div>
        <div style="margin-top: 10px;">
            <label>Nama Pelanggan:</label>
            <input type="text" name="nama_pelanggan" required>
        </div>

        <hr>
        <h3>Data Detail (Barang)</h3>
        <div id="detail_barang_container">
            <div class="detail-item">
                <input type="text" name="barang_nama[]" placeholder="Nama Barang" required>
                <input type="number" name="barang_jumlah[]" placeholder="Jumlah" required>
                <input type="number" name="barang_harga[]" placeholder="Harga Satuan" required>
                <button type="button" class="hapus-barang">Hapus</button>
            </div>
        </div>
        
        <button type="button" id="tambah_barang">Tambah Barang</button>
        <hr>
        
        <button type="submit">Simpan Transaksi</button>
    </form>

    <script>
        document.getElementById('tambah_barang').addEventListener('click', function() {
            var container = document.getElementById('detail_barang_container');
            var newItem = document.createElement('div');
            newItem.classList.add('detail-item');
            newItem.innerHTML = `
                <input type="text" name="barang_nama[]" placeholder="Nama Barang" required>
                <input type="number" name="barang_jumlah[]" placeholder="Jumlah" required>
                <input type="number" name="barang_harga[]" placeholder="Harga Satuan" required>
                <button type="button" class="hapus-barang">Hapus</button>
            `;
            container.appendChild(newItem);
        });

        document.getElementById('detail_barang_container').addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('hapus-barang')) {
                e.target.parentElement.remove();
            }
        });
    </script>

</body>
</html>