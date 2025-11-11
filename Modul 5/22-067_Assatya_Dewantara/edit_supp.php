<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM supplier WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['telp'];

    $conn->query("UPDATE supplier SET nama_supplier='$nama', alamat='$alamat', no_hp='$no_hp' WHERE id=$id");
    header("Location: data_supp.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h3>Edit Supplier</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Supplier</label>
            <input type="text" name="nama_supplier" value="<?= $row['nama'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= $row['alamat'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" value="<?= $row['telp'] ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="data_supp.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
