<?php
require_once "koneksi.php";

$id = $_GET['id'];
$sql    = "SELECT * FROM supplier WHERE id = $id";
$result = mysqli_query($conn, $sql);
$data   = mysqli_fetch_assoc($result);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['nama'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $update = "UPDATE supplier SET 
                nama='$nama',
                telp='$telp',
                alamat='$alamat'
               WHERE id=$id";
    if (mysqli_query($conn, $update)) {
        header("Location: read.php");
        exit;
    } else {
        echo "<h1>Update Gagal</h1>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
    <title>Edit Data Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Master Supplier</h2>
    <form action="" method="POST">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br>
        <label>Telepon</label>
        <input type="text" name="telp" value="<?= $data['telp']; ?>" required><br>
        <label>Alamat</label>
        <input type="text" name="alamat" value="<?= $data['alamat']; ?>" required><br>
        <button type="submit" class="btn btn-green">Update</button>
        <a href="read.php" class="btn btn-red">Batal</a>
    </form>
</body>
</html>
