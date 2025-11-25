<?php
include "koneksi.php";

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama     = $_POST['nama'];
    $role     = $_POST['role']; // ambil role dari dropdown

    // Cek username duplikat
    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    
    if(mysqli_num_rows($cek) > 0){
        echo "<script>alert('Username sudah digunakan!');</script>";
    } else {
        mysqli_query($koneksi, 
        "INSERT INTO user (username, password, nama, role) 
         VALUES ('$username', '$password', '$nama', '$role')");
        
        echo "<script>alert('Akun berhasil dibuat! Silahkan login'); 
        window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Registrasi Akun</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Buat Akun Baru</h2>

<form method="POST">

    Nama :  
    <input type="text" name="nama" required>

    Username :  
    <input type="text" name="username" required>

    Password :  
    <input type="password" name="password" required>

    Role :  
    <select name="role" required>
        <option value="">-- Pilih Role --</option>
        <option value="1">Admin</option>
        <option value="2">User Biasa</option>
    </select>

    <button type="submit" name="register">Daftar</button>
</form>

<p style="margin-top: 10px;">
    Sudah punya akun? <a href="login.php">Login di sini</a>
</p>

</div>

</body>
</html>
