<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['telp'];

    $conn->query("INSERT INTO supplier (nama_supplier, alamat, no_hp) VALUES ('$nama', '$alamat', '$no_hp')");
    header("Location: data_supp.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Supplier</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Supplier</label>
            <input type="text" name="nama_supplier" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="data_supp.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
