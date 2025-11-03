<?php
include 'koneksi.php';
require 'validate.inc';

$namaErr = $telpErr = $alamatErr = "";
$nama = $telp = $alamat = "";

if (isset($_POST['simpan'])) {
    $namaErr   = validateName($_POST, 'nama');
    $telpErr   = validatePhone($_POST, 'telp');
    $alamatErr = validateAddress($_POST, 'alamat');

    if ($namaErr == "" && $telpErr == "" && $alamatErr == "") {
        $nama   = $_POST['nama'];
        $telp   = $_POST['telp'];
        $alamat = $_POST['alamat'];

        mysqli_query($koneksi, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama','$telp','$alamat')");
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
</head>
<body>
    <h2>Tambah Data Supplier</h2>
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

        <input type="submit" name="simpan" value="Simpan">
        <a href="index.php">Batal</a>
    </form>
</body>
</html>