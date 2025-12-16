<?php
require_once 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('".$_POST['name']."', '".$_POST['telp']."', '".$_POST['alamat']."')";

    if(mysqli_query($connect, $sql)){
        echo "Tambah Data berhasil <br><button><a href='read.php'>Kembali</a></button>";
    }

} else {
    echo "
    <h3>Tambah Data Master Supplier Baru</h3>
    <form action='' method='post'>
        <label for='name'>Nama : <input type='text' name='name' required></label><br>
        <label for='telp'>No Telp : <input type='telp' name='telp' required></label><br>
        <label for='alamat'>Alamat : <input type='alamat' name='alamat' required></label><br>
        <input type='submit' value='Tambah'>
        <input type='reset' value='Reset'>
    </form>:";
}
?>