<?php
require "koneksi.php";

$sqlBarang = mysqli_query($conn, "SELECT * FROM barang");
$sqlPelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Input Transaksi Manual (Tanpa JS)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Input Transaksi Penjualan</h4>
        </div>
        <div class="card-body">

            <form action="simpan_transaksi.php" method="POST">
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Transaksi</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="pelanggan_id" class="form-label">Pilih Pelanggan</label>
                    <select name="pelanggan_id" id="pelanggan_id" class="form-select" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        <?php while($p = mysqli_fetch_assoc($sqlPelanggan)) { ?>
                            <option value="<?= $p['id']; ?>"><?= htmlspecialchars($p['nama']); ?></option>
                        <?php } ?>
                    </select>
                </div>

                <h5 class="mt-4 mb-3">Data Barang</h5>

                <table class="table table-bordered align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th style="width: 20%">Kode Barang</th>
                            <th style="width: 25%">Nama Barang</th>
                            <th style="width: 15%">Harga</th>
                            <th style="width: 10%">Qty</th>
                            <th style="width: 30%">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i < 3; $i++) { ?>
                        <tr>
                            <td>
                                <select name="kode_barang[]" class="form-select" required>
                                    <option value="">-- Pilih Kode --</option>
                                    <?php
                                    mysqli_data_seek($sqlBarang, 0);
                                    while($b = mysqli_fetch_assoc($sqlBarang)) {
                                        echo "<option value='{$b['kode_barang']}'>{$b['kode_barang']}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><input type="text" name="nama_barang[]" class="form-control" placeholder="Nama Barang" required></td>
                            <td><input type="number" name="harga[]" class="form-control" placeholder="Harga" required></td>
                            <td><input type="number" name="qty[]" class="form-control" value="1" min="1" required></td>
                            <td><input type="text" name="keterangan[]" class="form-control" placeholder="Keterangan"></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>

        </div>
    </div>

    <div class="mt-4">
        <h4>Daftar Barang</h4>
        <table class="table table-striped table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                mysqli_data_seek($sqlBarang, 0);
                while($row = mysqli_fetch_assoc($sqlBarang)) {
                    echo "<tr>
                            <td>{$row['kode_barang']}</td>
                            <td>{$row['nama_barang']}</td>
                            <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>