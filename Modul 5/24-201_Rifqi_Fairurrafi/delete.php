<?php
require_once "koneksi.php";
$id = $_POST['hapus'];
$sql = "DELETE FROM supplier WHERE id = $id";

if(mysqli_query($connect, $sql)){
    echo "Hapus data berhasil!";
}
?>
<br>
<button><a href="read.php">Kembali</a></button>