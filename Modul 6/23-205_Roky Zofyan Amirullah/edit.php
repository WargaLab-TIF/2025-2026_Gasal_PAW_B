<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi</title>
    <style>
        .detail-item { margin-bottom: 10px; padding: 5px; border: 1px solid #ccc; }
        .detail-item input { margin-right: 5px; }
        #detail_barang_container { margin-top: 15px; }
    </style>
</head>
<body>
    <h1>Edit Transaksi</h1>

    <?php
    require 'koneksi.php';
    if (!isset($_GET['id'])) { die("Error: ID Nota tidak ditemukan."); }
    $id_nota = $_GET['id'];

    $sql_master = "SELECT * FROM nota WHERE id_nota = ?";
    $stmt_master = mysqli_prepare($conn, $sql_master);
    mysqli_stmt_bind_param($stmt_master, "i", $id_nota);
    mysqli_stmt_execute($stmt_master);
    $result_master = mysqli_stmt_get_result($stmt_master);
    if (mysqli_num_rows($result_master) == 0) { die("Data nota tidak ditemukan."); }
    $nota = mysqli_fetch_assoc($result_master);
    ?>

    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id_nota" value="<?php echo $nota['id_nota']; ?>">
        
        <h3>Data Master</h3>
        <div>
            <label>No. Nota:</label>
            <input type="text" name="no_nota" value="<?php echo $nota['no_nota']; ?>" required>
        </div>
        <div style="margin-top: 10px;">
            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="<?php echo $nota['tanggal']; ?>" required>
        </div>
        <div style="margin-top: 10px;">
            <label>Nama Pelanggan:</label>
            <input type="text" name="nama_pelanggan" value="<?php echo $nota['nama_pelanggan']; ?>" required>
        </div>

        <hr>
        <h3>Data Detail</h3>
        <div id="detail_barang_container">
            <?php
            $sql_detail = "SELECT * FROM detail_barang WHERE id_nota = ?";
            $stmt_detail = mysqli_prepare($conn, $sql_detail);
            mysqli_stmt_bind_param($stmt_detail, "i", $id_nota);
            mysqli_stmt_execute($stmt_detail);
            $result_detail = mysqli_stmt_get_result($stmt_detail);
            
            while($detail = mysqli_fetch_assoc($result_detail)) {
            ?>
                <div class="detail-item">
                    <input type="hidden" name="id_detail_existing[]" value="<?php echo $detail['id_detail']; ?>">
                    
                    <input type="text" name="barang_nama_existing[]" placeholder="Nama Barang" value="<?php echo $detail['nama_barang']; ?>" required>
                    <input type="number" name="barang_jumlah_existing[]" placeholder="Jumlah" value="<?php echo $detail['jumlah']; ?>" required>
                    <input type="number" name="barang_harga_existing[]" placeholder="Harga Satuan" value="<?php echo $detail['harga_satuan']; ?>" required>
                    
                    <label><input type="checkbox" name="hapus_detail[]" value="<?php echo $detail['id_detail']; ?>"> Hapus Item Ini</label>
                </div>
            <?php } ?>
        </div>
        
        <button type="button" id="tambah_barang">Tambah Barang Baru</button>
        <hr>
        
        <button type="submit">Update Transaksi</button>
    </form>

    <script>
        document.getElementById('tambah_barang').addEventListener('click', function() {
            var container = document.getElementById('detail_barang_container');
            var newItem = document.createElement('div');
            newItem.classList.add('detail-item');
            newItem.innerHTML = `
                <input type="text" name="barang_nama_baru[]" placeholder="Nama Barang BARU" required>
                <input type="number" name="barang_jumlah_baru[]" placeholder="Jumlah" required>
                <input type="number" name="barang_harga_baru[]" placeholder="Harga Satuan" required>
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