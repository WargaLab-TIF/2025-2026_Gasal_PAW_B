<?php
require 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");

header("Location: index.php");
exit();
?>
