<?php
include "koneksi.php";
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM barang WHERE id='$id'")->fetch_assoc();

if (isset($_POST['update'])) {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "UPDATE barang SET 
            kode_barang='$kode',
            nama_barang='$nama',
            harga='$harga',
            stok='$stok'
            WHERE id='$id'";
    if ($conn->query($sql)) {
        echo "<script>alert('Data berhasil diperbarui!'); location='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Edit Barang</h2>
<form method="POST">
    <label>Kode Barang</label><br>
    <input type="text" name="kode_barang" value="<?= $data['kode_barang'] ?>" required><br>

    <label>Nama Barang</label><br>
    <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" required><br>

    <label>Harga</label><br>
    <input type="number" name="harga" value="<?= $data['harga'] ?>" required><br>

    <label>Stok</label><br>
    <input type="number" name="stok" value="<?= $data['stok'] ?>"><br>

    <button type="submit" name="update">Update</button>
    <a href="index.php" class="btn">Kembali</a>
</form>
</body>
</html>