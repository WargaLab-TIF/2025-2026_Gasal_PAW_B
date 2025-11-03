<?php
require_once "koneksi.php";

$sql = "DELETE FROM supplier WHERE id =11";

if(mysqli_query($cont,$sql)){
    echo"berhasil";
}