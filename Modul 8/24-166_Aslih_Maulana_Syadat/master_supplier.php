<?php
session_start();
include 'koneksi.php';
if ($_SESSION['level'] != 1) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Master Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Data Supplier</h2>
        <a href="CRUD/tambah_supplier.php" class="btn btn-green">+ Tambah Supplier</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $q = mysqli_query($conn, "SELECT * FROM supplier");
                while ($d = mysqli_fetch_array($q)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['telp'] ?></td>
                        <td><?= $d['alamat'] ?></td>
                        <td>
                            <a href="CRUD/edit_supplier.php?id=<?= $d['id'] ?>" class="btn btn-orange">Edit</a>
                            <a href="CRUD/hapus_supplier.php?id=<?= $d['id'] ?>" class="btn btn-red" onclick="return confirm('Hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>