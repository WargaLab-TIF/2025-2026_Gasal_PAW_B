<?php include '../koneksi.php';
if (isset($_POST['simpan'])) {
    $pass = md5($_POST['pass']);
    mysqli_query($conn, "INSERT INTO user (username, password, nama, level) VALUES ('$_POST[user]','$pass','$_POST[nama]','$_POST[level]')");
    header("location:../master_user.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container" style="max-width:500px; margin-top:50px;">
        <h3>Tambah User</h3>
        <form method="post">
            <div class="form-group"><label>Username</label><input type="text" name="user" required></div>
            <div class="form-group"><label>Password</label><input type="password" name="pass" required></div>
            <div class="form-group"><label>Nama</label><input type="text" name="nama" required></div>
            <div class="form-group"><label>Level</label><select name="level">
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select></div>
            <button name="simpan" class="btn btn-green">Simpan</button>
            <a href="../master_user.php" class="btn btn-red">Batal</a>
        </form>
    </div>
</body>

</html>