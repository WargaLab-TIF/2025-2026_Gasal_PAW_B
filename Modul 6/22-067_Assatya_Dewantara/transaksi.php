<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function confirmDelete(id) {
            if (confirm("Yakin hapus transaksi ini?")) {
                window.location = "transaksi_hapus.php?id=" + id;
            }
        }
    </script>
</head>
<body>
<div class="container mt-4">
    <h3>Data Transaksi</h3>
    <a href="index.php" class="btn btn-secondary mb-3">Kembali</a>
    <a href="transaksi_tambah.php" class="btn btn-success mb-3">+ Tambah Transaksi</a>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Total</th>
                <th>Pelanggan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT t.*, p.nama as pelanggan FROM transaksi t LEFT JOIN pelanggan p ON t.pelanggan_id=p.id");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['waktu_transaksi']}</td>
                <td>{$row['keterangan']}</td>
                <td>{$row['total']}</td>
                <td>{$row['pelanggan']}</td>
                <td>
                    <a href='transaksi_edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <button onclick='confirmDelete({$row['id']})' class='btn btn-danger btn-sm'>Hapus</button>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
