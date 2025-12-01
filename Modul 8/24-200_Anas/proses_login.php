<?php
session_start();
require 'koneksi.php'; 

$username = $_POST['username'];
$password = md5($_POST['password']); 

$query = mysqli_query($connect, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){
    $data = mysqli_fetch_assoc($query);

    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['level'] = $data['level']; 
    
    header("location:admin.php");
} else {
    header("location:login.php?pesan=gagal");
}
?>