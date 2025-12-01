<?php include '../koneksi.php';
if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO pelanggan VALUES ('$_POST[id]','$_POST[nama]','$_POST[jk]','$_POST[telp]','$_POST[alamat]')");
    header("location:../master_pelanggan.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container" style="max-width:500px; margin-top:50px;">
        <h3>Tambah Pelanggan</h3>
        <form method="post">
            <div class="form-group"><label>ID (Cth: PEL-001)</label><input type="text" name="id" required></div>
            <div class="form-group"><label>Nama</label><input type="text" name="nama" required></div>
            <div class="form-group"><label>L/P</label><select name="jk">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select></div>
            <div class="form-group"><label>Telp</label><input type="text" name="telp"></div>
            <div class="form-group"><label>Alamat</label><textarea name="alamat"></textarea></div>
            <button name="simpan" class="btn btn-green">Simpan</button>
            <a href="../master_pelanggan.php" class="btn btn-red">Batal</a>
        </form>
    </div>
</body>

</html>