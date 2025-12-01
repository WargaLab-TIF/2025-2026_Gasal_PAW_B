<?php include '../koneksi.php';
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO barang (kode_barang, nama_barang, harga, stok) VALUES ('$_POST[kode]','$_POST[nama]','$_POST[harga]','$_POST[stok]')");
    header("location:../master_barang.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container" style="max-width:500px; margin-top:50px;">
        <h3>Tambah Barang</h3>
        <form method="post">
            <div class="form-group"><label>Kode</label><input type="text" name="kode" required></div>
            <div class="form-group"><label>Nama</label><input type="text" name="nama" required></div>
            <div class="form-group"><label>Harga</label><input type="number" name="harga" required></div>
            <div class="form-group"><label>Stok</label><input type="number" name="stok" required></div>
            <button name="simpan" class="btn btn-green">Simpan</button>
            <a href="../master_barang.php" class="btn btn-red">Batal</a>
        </form>
    </div>
</body>

</html>