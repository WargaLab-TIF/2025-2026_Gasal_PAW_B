<?php include '../koneksi.php';
$id = $_GET['id'];
$d = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'"));
if (isset($_POST['update'])) {
    $sql = "UPDATE user SET username='$_POST[user]', nama='$_POST[nama]', level='$_POST[level]' WHERE id_user='$id'";
    if (!empty($_POST['pass'])) {
        $p = md5($_POST['pass']);
        $sql = "UPDATE user SET username='$_POST[user]', password='$p', nama='$_POST[nama]', level='$_POST[level]' WHERE id_user='$id'";
    }
    mysqli_query($conn, $sql);
    header("location:../master_user.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container" style="max-width:500px; margin-top:50px;">
        <h3>Edit User</h3>
        <form method="post">
            <div class="form-group"><label>Username</label><input type="text" name="user" value="<?= $d['username'] ?>"></div>
            <div class="form-group"><label>Password (Kosongi jika tidak ubah)</label><input type="password" name="pass"></div>
            <div class="form-group"><label>Nama</label><input type="text" name="nama" value="<?= $d['nama'] ?>"></div>
            <div class="form-group"><label>Level</label><select name="level">
                    <option value="1" <?= ($d['level'] == 1) ? 'selected' : '' ?>>Admin</option>
                    <option value="2" <?= ($d['level'] == 2) ? 'selected' : '' ?>>User</option>
                </select></div>
            <button name="update" class="btn btn-blue">Update</button>
            <a href="../master_user.php" class="btn btn-red">Batal</a>
        </form>
    </div>
</body>

</html>