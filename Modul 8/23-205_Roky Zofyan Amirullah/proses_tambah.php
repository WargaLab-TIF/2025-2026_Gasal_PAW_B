<?php 
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$level = $_POST['level'];

mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$username','$password','$nama','$alamat','$hp','$level')");
header("location:data_user.php?pesan=tambah");
?>