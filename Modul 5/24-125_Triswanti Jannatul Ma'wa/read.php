<?php
require_once "koneksi.php";

$sql = "SELECT * FROM supplier ";

if(mysqli_query($cont,$sql)){
    echo "berhasil";
}