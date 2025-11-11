<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Transaksi Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2 class="text-center mb-4 fw-bold">Sistem Transaksi Penjualan</h2>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tambah-tab" data-bs-toggle="tab" data-bs-target="#tambah" type="button" role="tab">Tambah Transaksi</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="hasil-tab" data-bs-toggle="tab" data-bs-target="#hasil" type="button" role="tab">Hasil (Nota)</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="barang-tab" data-bs-toggle="tab" data-bs-target="#barang" type="button" role="tab">Barang</button>
        </li>
    </ul>

    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="tambah" role="tabpanel">
            <?php include 'tambah_transaksi.php'; ?>
        </div>
        <div class="tab-pane fade" id="hasil" role="tabpanel">
            <?php include 'list_transaksi.php'; ?>
        </div>
        <div class="tab-pane fade" id="barang" role="tabpanel">
            <?php
            include 'koneksi.php';
            $barang = mysqli_query($conn, "SELECT b.*, s.nama AS nama_supplier 
                                           FROM penjualan_barang b 
                                           JOIN penjualan_supplier s ON b.supplier_id = s.id");
            ?>
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Kode</th><th>Nama Barang</th><th>Harga</th><th>Stok</th><th>Supplier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($barang)) { ?>
                    <tr>
                        <td><?= $row['kode_barang']; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td>Rp <?= number_format($row['harga']); ?></td>
                        <td><?= $row['stok']; ?></td>
                        <td><?= $row['nama_supplier']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
