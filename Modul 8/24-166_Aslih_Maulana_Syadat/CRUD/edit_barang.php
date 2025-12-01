<?php include '../koneksi.php';
$id = $_GET['id'];
$d = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM barang WHERE id='$id'"));
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE barang SET kode_barang='$_POST[kode]', nama_barang='$_POST[nama]', harga='$_POST[harga]', stok='$_POST[stok]' WHERE id='$id'");
    header("location:../master_barang.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container" style="max-width:500px; margin-top:50px;">
        <h3>Edit Barang</h3>
        <form method="post">
            <div class="form-group"><label>Kode</label><input type="text" name="kode" value="<?= $d['kode_barang'] ?>"></div>
            <div class="form-group"><label>Nama</label><input type="text" name="nama" value="<?= $d['nama_barang'] ?>"></div>
            <div class="form-group"><label>Harga</label><input type="number" name="harga" value="<?= $d['harga'] ?>"></div>
            <div class="form-group"><label>Stok</label><input type="number" name="stok" value="<?= $d['stok'] ?>"></div>
            <button name="update" class="btn btn-blue">Update</button>
            <a href="../master_barang.php" class="btn btn-red">Batal</a>
        </form>
    </div>
</body>

</html>