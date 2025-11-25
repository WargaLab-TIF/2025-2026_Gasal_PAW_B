<?php
$koneksi = mysqli_connect("localhost:3307","root","","db_latihan");

if(!$koneksi){
    echo "Koneksi gagal!";
}
?>