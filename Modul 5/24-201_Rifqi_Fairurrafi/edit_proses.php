<?php
require_once "koneksi.php";
$id = $_POST['id'];
$nama = $_POST['name'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$sql = "UPDATE supplier SET nama = '$nama' , telp = '$telp', alamat = '$alamat' WHERE id = '$id'";

if(mysqli_query($connect, $sql)){
    echo "Edit Berhasil";
}
?>
<br>
<button><a href="read.php">Kembali</a></button>