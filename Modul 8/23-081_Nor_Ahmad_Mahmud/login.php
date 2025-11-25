<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);

    if($cek > 0){
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama']    = $data['nama'];
        $_SESSION['role']    = $data['role'];
        $_SESSION['status']  = "login";

        if($data['role'] == 1){
            header("Location: Admin/index.php");
        } else {
            header("Location: User/index.php");
        }

    } else {
        echo "<script>alert('Username atau password salah'); window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Halaman Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Login</h2>

<form method="POST">
    Username : <input type="text" name="username" required><br>
    Password : <input type="password" name="password" required><br>
    <button type="submit" name="login">Login</button>
</form>

<!-- Tambahan link register -->
<p style="margin-top: 10px;">
    Jika belum mempunyai akun silahkan 
    <a href="register.php">buat</a>.
</p>

</div>

</body>
</html>
