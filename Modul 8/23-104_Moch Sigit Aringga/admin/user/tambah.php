<?php include 'config.php';
include '../../auth.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama     = $_POST['nama'];
    $alamat   = $_POST['alamat'];
    $hp       = $_POST['hp'];
    $level    = $_POST['level'];

    mysqli_query($conn, "INSERT INTO user (username, password, nama, alamat, hp, level)
                         VALUES('$username', '$password', '$nama', '$alamat', '$hp', '$level')");
    
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body class="p-3">

<h3>Tambah User</h3>
<form action="" method="POST">

    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    Nama lengkap: <input type="text" name="nama" required><br><br>
    Alamat: <textarea name="alamat" required></textarea><br><br>
    No HP: <input type="text" name="hp" required><br><br>
    
    Level:
    <select name="level" required>
        <option value="1">Admin</option>
        <option value="2">Kasir</option>
    </select>
    <br><br>

    <button type="submit" name="submit" class="btn btn-success">Simpan</button>
</form>

</body>
</html>
