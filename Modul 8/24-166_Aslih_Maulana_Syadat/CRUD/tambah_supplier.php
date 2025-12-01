<?php include '../koneksi.php';
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$_POST[nama]','$_POST[telp]','$_POST[alamat]')");
    header("location:../master_supplier.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container" style="max-width:500px; margin-top:50px;">
        <h3>Tambah Supplier</h3>
        <form method="post">
            <div class="form-group"><label>Nama</label><input type="text" name="nama" required></div>
            <div class="form-group"><label>Telp</label><input type="text" name="telp"></div>
            <div class="form-group"><label>Alamat</label><textarea name="alamat"></textarea></div>
            <button name="simpan" class="btn btn-green">Simpan</button>
            <a href="../master_supplier.php" class="btn btn-red">Batal</a>
        </form>
    </div>
</body>

</html>