<?php include 'config.php'; ?>
<?php include '../header.php'; ?>
<?php include '../../auth.php';?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Supplier</title>

    <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        body {
            background: #eef1f6;
            font-family: "Segoe UI", sans-serif;
        }
        .page-title {
            font-weight: 600;
            color: #333;
        }
        .card {
            border-radius: 14px;
            border: none;
        }
        thead th {
            background: #4a69bd !important;
            color: white !important;
        }
        .btn-primary, .btn-warning, .btn-danger {
            border-radius: 8px;
        }
        .container-box {
            max-width: 1000px;
            margin: auto;
            margin-top: 40px;
        }
    </style>
</head>

<body>

<div class="container-box">

    <div class="d-flex justify-content-between mb-3">
        <h3 class="page-title">Data Supplier</h3>
        <a href="tambah.php" class="btn btn-primary">+ Tambah Supplier</a>
    </div>

    <div class="card shadow-sm p-3">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                $no = 1;
                $result = mysqli_query($conn, "SELECT * FROM supplier");

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['telp']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus.php?id=<?= $row['id']; ?>" 
                           onclick="return confirm('Yakin hapus?')"
                           class="btn btn-danger btn-sm ms-1">
                           Hapus
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

</div>

</body>
</html>
