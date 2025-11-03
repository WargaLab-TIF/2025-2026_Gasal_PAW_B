<?php
require_once "koneksi.php";

$sql = "UPDATE supplier SET alamat = 'Malang' WHERE id = 2";

if(mysqli_query($cont,$sql)){
    echo "update erhasil";
}