<?php 
include 'koneksi.php';
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$level = $_POST['level'];

if($password != "") {
    $pass_md5 = md5($password);
    mysqli_query($koneksi, "UPDATE user SET username='$username', password='$pass_md5', nama='$nama', alamat='$alamat', hp='$hp', level='$level' WHERE id_user='$id'");
} else {
    mysqli_query($koneksi, "UPDATE user SET username='$username', nama='$nama', alamat='$alamat', hp='$hp', level='$level' WHERE id_user='$id'");
}
header("location:data_user.php?pesan=update");
?>