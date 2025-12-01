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
    <title>Master Pelanggan</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Data Pelanggan</h2>
        <a href="CRUD/tambah_pelanggan.php" class="btn btn-green">+ Tambah Pelanggan</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>L/P</th>
                    <th>Telp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $q = mysqli_query($conn, "SELECT * FROM pelanggan");
                while ($d = mysqli_fetch_array($q)) { ?>
                    <tr>
                        <td><?= $d['id'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['jenis_kelamin'] ?></td>
                        <td><?= $d['telp'] ?></td>
                        <td><?= $d['alamat'] ?></td>
                        <td>
                            <a href="CRUD/edit_pelanggan.php?id=<?= $d['id'] ?>" class="btn btn-orange">Edit</a>
                            <a href="CRUD/hapus_pelanggan.php?id=<?= $d['id'] ?>" class="btn btn-red" onclick="return confirm('Hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>