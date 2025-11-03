<?php
include 'koneksi.php';
require 'validate.inc';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM supplier WHERE id=$id"));

$nama = $data['nama'];
$telp = $data['telp'];
$alamat = $data['alamat'];
$namaErr = $telpErr = $alamatErr = "";

if (isset($_POST['update'])) {
    $namaErr   = validateName($_POST, 'nama');
    $telpErr   = validatePhone($_POST, 'telp');
    $alamatErr = validateAddress($_POST, 'alamat');

    if ($namaErr == "" && $telpErr == "" && $alamatErr == "") {
        $nama   = $_POST['nama'];
        $telp   = $_POST['telp'];
        $alamat = $_POST['alamat'];

        mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id");
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Supplier</title>
</head>
<body>
    <h2>Edit Data Supplier</h2>
    <form method="POST">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $nama; ?>"><br>
        <small style="color:red;"><?= $namaErr; ?></small><br>

        <label>Telp:</label><br>
        <input type="text" name="telp" value="<?= $telp; ?>"><br>
        <small style="color:red;"><?= $telpErr; ?></small><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat" value="<?= $alamat; ?>"><br>
        <small style="color:red;"><?= $alamatErr; ?></small><br>

        <input type="submit" name="update" value="Update">
        <a href="index.php">Batal</a>
    </form>
</body>
</html>