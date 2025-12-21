<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugas_pendahuluan";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    echo "koneksi gagal";
}
?>