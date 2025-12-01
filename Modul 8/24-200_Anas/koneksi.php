<?php
$servername = 'localhost';
$username = 'root';
$password= '';
$dbname = 'db_user';

$connect = mysqli_connect($servername, $username, $password,$dbname);

if(!$connect){
    echo 'koneksi error';
}

?>