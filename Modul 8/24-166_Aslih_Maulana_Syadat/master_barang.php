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
    <title>Master Barang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Data Barang</h2>
        <a href="CRUD/tambah_barang.php" class="btn btn-green">+ Tambah Barang</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $q = mysqli_query($conn, "SELECT * FROM barang ORDER BY id DESC");
                while ($d = mysqli_fetch_array($q)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['kode_barang'] ?></td>
                        <td><?= $d['nama_barang'] ?></td>
                        <td>Rp <?= number_format($d['harga']) ?></td>
                        <td><?= $d['stok'] ?></td>
                        <td>
                            <a href="CRUD/edit_barang.php?id=<?= $d['id'] ?>" class="btn btn-orange">Edit</a>
                            <a href="CRUD/hapus_barang.php?id=<?= $d['id'] ?>" class="btn btn-red" onclick="return confirm('Hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>