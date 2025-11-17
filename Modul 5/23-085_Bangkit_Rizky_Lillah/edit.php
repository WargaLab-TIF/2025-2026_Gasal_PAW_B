<?php
include 'koneksi.php';

$id = $_GET['id'] ?? 0;
$result = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) die("Data tidak ditemukan!");

$nama = $data['nama'];
$telp = $data['telp'];
$alamat = $data['alamat'];
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"]);
    $telp = trim($_POST["telp"]);
    $alamat = trim($_POST["alamat"]);

    if ($nama == "") $errors['nama'] = "Nama wajib diisi.";
    if ($telp == "") $errors['telp'] = "Nomor telepon wajib diisi.";
    elseif (!preg_match("/^[0-9]+$/", $telp)) $errors['telp'] = "Nomor telepon hanya boleh angka.";
    if ($alamat == "") $errors['alamat'] = "Alamat wajib diisi.";

    if (empty($errors)) {
        $query = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id";
        mysqli_query($koneksi, $query);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h3>Edit Data Master Supplier</h3>
    <form method="post">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($nama) ?>">
            <small class="text-danger"><?= $errors['nama'] ?? '' ?></small>
        </div>
        <div class="mb-3">
            <label>Telp</label>
            <input type="text" name="telp" class="form-control" value="<?= htmlspecialchars($telp) ?>">
            <small class="text-danger"><?= $errors['telp'] ?? '' ?></small>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"><?= htmlspecialchars($alamat) ?></textarea>
            <small class="text-danger"><?= $errors['alamat'] ?? '' ?></small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
