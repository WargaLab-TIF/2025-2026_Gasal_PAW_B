<?php include '../koneksi.php';
$id = $_GET['id'];
$d = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM pelanggan WHERE id='$id'"));
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE pelanggan SET nama='$_POST[nama]', jenis_kelamin='$_POST[jk]', telp='$_POST[telp]', alamat='$_POST[alamat]' WHERE id='$id'");
    header("location:../master_pelanggan.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container" style="max-width:500px; margin-top:50px;">
        <h3>Edit Pelanggan</h3>
        <form method="post">
            <div class="form-group"><label>ID</label><input type="text" value="<?= $d['id'] ?>" readonly style="background:#eee"></div>
            <div class="form-group"><label>Nama</label><input type="text" name="nama" value="<?= $d['nama'] ?>"></div>
            <div class="form-group"><label>JK</label><select name="jk">
                    <option value="L" <?= ($d['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki</option>
                    <option value="P" <?= ($d['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                </select></div>
            <div class="form-group"><label>Telp</label><input type="text" name="telp" value="<?= $d['telp'] ?>"></div>
            <div class="form-group"><label>Alamat</label><textarea name="alamat"><?= $d['alamat'] ?></textarea></div>
            <button name="update" class="btn btn-blue">Update</button>
            <a href="../master_pelanggan.php" class="btn btn-red">Batal</a>
        </form>
    </div>
</body>

</html>