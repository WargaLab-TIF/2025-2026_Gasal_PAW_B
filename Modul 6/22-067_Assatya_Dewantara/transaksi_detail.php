<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function confirmDelete(tid, bid) {
            if (confirm("Yakin hapus detail transaksi ini?")) {
                window.location = "transaksi_detail_hapus.php?tid=" + tid + "&bid=" + bid;
            }
        }
    </script>
</head>
<body>
<div class="container mt-4">
    <h3>Detail Transaksi</h3>
    <a href="index.php" class="btn btn-secondary mb-3">Kembali</a>
    <a href="transaksi_detail_tambah.php" class="btn btn-success mb-3">+ Tambah Detail</a>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>ID Transaksi</th>
                <th>Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT td.*, b.nama_barang FROM transaksi_detail td JOIN barang b ON td.barang_id=b.id");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['transaksi_id']}</td>
                <td>{$row['nama_barang']}</td>
                <td>{$row['harga']}</td>
                <td>{$row['qty']}</td>
                <td>
                    <a href='transaksi_detail_edit.php?tid={$row['transaksi_id']}&bid={$row['barang_id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <button onclick='confirmDelete({$row['transaksi_id']},{$row['barang_id']})' class='btn btn-danger btn-sm'>Hapus</button>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
