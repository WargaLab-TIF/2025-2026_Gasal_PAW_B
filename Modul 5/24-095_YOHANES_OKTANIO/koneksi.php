<?php
$conn = mysqli_connect("localhost","root","","penjualan");

if (mysqli_connect_errno()) {
    echo "Koneksi gagal ke mysql!";
}