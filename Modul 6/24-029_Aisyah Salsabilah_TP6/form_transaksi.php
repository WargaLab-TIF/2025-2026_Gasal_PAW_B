<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Transaksi Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
<div class="container">
    <h2 class="mb-4 text-center">Form Input Transaksi Penjualan</h2>
    <form action="simpan_transaksi.php" method="POST">

        <div class="card mb-3">
            <div class="card-header bg-primary text-white">Data Nota</div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Tanggal Transaksi</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Pelanggan</label>
                    <select name="id_pelanggan" class="form-control" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        <?php
                        $q = mysqli_query($conn, "SELECT * FROM pelanggan");
                        while ($d = mysqli_fetch_assoc($q)) {
                            echo "<option value='$d[id]'>$d[nama]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-success text-white">Detail Barang</div>
            <div class="card-body" id="barang-area">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <label>Barang</label>
                        <select name="id_barang[]" class="form-control" required>
                            <option value="">-- Pilih Barang --</option>
                            <?php
                            $barang = mysqli_query($conn, "SELECT * FROM barang");
                            while ($b = mysqli_fetch_assoc($barang)) {
                                echo "<option value='$b[id]'>$b[nama_barang] - Rp$b[harga]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Qty</label>
                        <input type="number" name="qty[]" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label>Subtotal</label>
                        <input type="number" name="subtotal[]" class="form-control" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-item">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="button" id="add-item" class="btn btn-secondary">+ Tambah Barang</button>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
        </div>
    </form>
</div>

<script>

document.getElementById('add-item').addEventListener('click', function() {
    let area = document.getElementById('barang-area');
    let newRow = document.createElement('div');
    newRow.classList.add('row', 'mb-2');
    newRow.innerHTML = `
        <div class="col-md-4">
            <select name="id_barang[]" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                <?php
                $barang = mysqli_query($conn, "SELECT * FROM barang");
                while ($b = mysqli_fetch_assoc($barang)) {
                    echo "<option value='$b[id]'>$b[nama_barang] - Rp$b[harga]</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <input type="number" name="qty[]" class="form-control" required>
        </div>
        <div class="col-md-3">
            <input type="number" name="subtotal[]" class="form-control" required>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="button" class="btn btn-danger remove-item">Hapus</button>
        </div>
    `;
    area.appendChild(newRow);
});

// hapus baris barang
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-item')) {
        e.target.closest('.row').remove();
    }
});
</script>
</body>
</html>
