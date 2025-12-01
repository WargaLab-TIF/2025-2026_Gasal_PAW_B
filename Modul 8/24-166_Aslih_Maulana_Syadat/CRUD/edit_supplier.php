<?php include '../koneksi.php';
$id = $_GET['id'];
$d = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM supplier WHERE id='$id'"));
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE supplier SET nama='$_POST[nama]', telp='$_POST[telp]', alamat='$_POST[alamat]' WHERE id='$id'");
    header("location:../master_supplier.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container" style="max-width:500px; margin-top:50px;">
        <h3>Edit Supplier</h3>
        <form method="post">
            <div class="form-group"><label>Nama</label><input type="text" name="nama" value="<?= $d['nama'] ?>"></div>
            <div class="form-group"><label>Telp</label><input type="text" name="telp" value="<?= $d['telp'] ?>"></div>
            <div class="form-group"><label>Alamat</label><textarea name="alamat"><?= $d['alamat'] ?></textarea></div>
            <button name="update" class="btn btn-blue">Update</button>
            <a href="../master_supplier.php" class="btn btn-red">Batal</a>
        </form>
    </div>
</body>

</html>