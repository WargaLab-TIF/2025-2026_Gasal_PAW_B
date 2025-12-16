<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'db_transaksi';

$conn = mysqli_connect($servername,$username,$password,$db);

if(!$conn){
    echo 'koneksi error';
}
