<?php
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['nama'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $sql = "INSERT INTO supplier (nama, telp, alamat)
            VALUES ('$nama', '$telp', '$alamat')";
    if (mysqli_query($conn, $sql)) {
        header("Location: read.php");
        exit;
    } else {
        echo "Gagal menambah data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
    <title>Tambah Data Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tambah Data Master Supplier Baru</h2>
    <form action="" method="POST">
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama" required><br>
        <label>Telepon</label>
        <input type="text" name="telp" placeholder="telp" required><br>
        <label>Alamat</label>
        <input type="text" name="alamat" placeholder="alamat" required><br>
        <button type="submit" class="btn btn-green">Simpan</button>
        <a href="read.php" class="btn btn-red">Batal</a>
    </form>
</body>
</html>
