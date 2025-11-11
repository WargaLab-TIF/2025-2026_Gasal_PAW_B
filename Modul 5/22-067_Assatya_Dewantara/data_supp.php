<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data supplier ini?")) {
                window.location = "hapus_supp.php?id=" + id;
            }
        }
    </script>
</head>
<body>
<div class="container mt-4">
    <h3>Data Supplier</h3>
    <a href="index.php" class="btn btn-secondary mb-3">Kembali</a>
    <a href="add_supp.php" class="btn btn-success mb-3">+ Tambah Supplier</a>
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM supplier");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['alamat']}</td>
                    <td>{$row['telp']}</td>
                    <td>
                        <a href='edit_supp.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
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
