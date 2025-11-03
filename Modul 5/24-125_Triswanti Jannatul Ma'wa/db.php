<?php
require_once "koneksi.php";

$sql = "CREATE DATABASE data_penjualan";
if(mysqli_query($cont,$sql)){
    echo "database berhasil";
}
