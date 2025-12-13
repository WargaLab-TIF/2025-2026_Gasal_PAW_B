<?php
require_once "koneksi.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $nama =  $_POST['nama'];
    $telp =  $_POST['telp'];
    $alamat =  $_POST['alamat'];

    $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
    mysqli_query($koneksi, $sql);

    header("Location: tampil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Master Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="border-bottom pb-3 mb-4">
            <h1 class="h3 mb-0 text-info">Tambah Data Master Supplier</h1>
        </div>
        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama :</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telp :</label>
                <input type="text" name="telp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat :</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" name="submit" class="btn btn-success text-white">Simpan</button>
                <a href="tampil.php" class="btn btn-danger text-white">Batal</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>