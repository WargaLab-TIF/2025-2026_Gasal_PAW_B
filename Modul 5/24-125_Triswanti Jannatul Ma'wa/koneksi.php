<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_penjualan";

$cont = mysqli_connect($servername,$username,$password,$dbname);

if(!$cont){
    echo "koneksi error";
}