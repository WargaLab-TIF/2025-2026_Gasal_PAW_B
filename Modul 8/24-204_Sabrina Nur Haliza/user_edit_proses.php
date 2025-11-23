<?php
include 'koneksi.php'; // Koneksi database

$id = intval($_POST['id_user']); // ID user yang diedit
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$hp = mysqli_real_escape_string($koneksi, $_POST['hp']);
$level = intval($_POST['level']); // Level akses

// Jika password diisi, password ikut diupdate
if (!empty($_POST['password'])) {
    $password = md5($_POST['password']);
    $sql = "UPDATE user SET username='$username', password='$password', nama='$nama', alamat='$alamat', hp='$hp', level=$level WHERE id_user=$id";
} else {
    // Jika password kosong, tidak diubah
    $sql = "UPDATE user SET username='$username', nama='$nama', alamat='$alamat', hp='$hp', level=$level WHERE id_user=$id";
}

// Jalankan update
mysqli_query($koneksi, $sql);

// Kembali ke halaman user
header('Location: user.php');
exit;
?>
