<?php
include 'config.php';
include '../header.php';
include '../../auth.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM barang WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['submit'])) {
    mysqli_query($conn, "UPDATE barang SET 
        kode_barang='$_POST[kode_barang]',
        nama_barang='$_POST[nama_barang]',
        harga='$_POST[harga]',
        stok='$_POST[stok]',
        supplier_id='$_POST[supplier_id]'
        WHERE id=$id");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h3 class="mb-4 text-center">Edit Barang</h3>

            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control"
                        value="<?= $row['kode_barang'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control"
                        value="<?= $row['nama_barang'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control"
                        value="<?= $row['harga'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control"
                        value="<?= $row['stok'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Supplier ID</label>
                    <input type="text" name="supplier_id" class="form-control"
                        value="<?= $row['supplier_id'] ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>