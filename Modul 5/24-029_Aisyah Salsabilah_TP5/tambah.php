<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Tambah Barang Baru</h2>
<form method="POST">
    <label>Kode Barang</label><br>
    <input type="text" name="kode_barang" required><br>

    <label>Nama Barang</label><br>
    <input type="text" name="nama_barang" required><br>

    <label>Harga</label><br>
    <input type="number" name="harga" required><br>

    <label>Stok</label><br>
    <input type="number" name="stok"><br>

    <button type="submit" name="simpan">Simpan</button>
    <a href="index.php" class="btn">Kembali</a>
</form>

<?php
if (isset($_POST['simpan'])) {
    $kode = $_POST['kode_barang'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO barang (kode_barang, nama_barang, harga, stok)
            VALUES ('$kode', '$nama', '$harga', '$stok')";
    if ($conn->query($sql)) {
        echo "<script>alert('Data berhasil disimpan!'); location='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
</body>
</html>