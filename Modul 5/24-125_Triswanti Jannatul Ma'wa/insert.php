<?php
require_once "koneksi.php";

$nama = "PT Dirgahayu";
$telp = "081352968209";
$alamat = "Manado";

$sql = "INSERT INTO supplier(nama,telp,alamat) VALUES ('$nama','$telp','$alamat')";

if (mysqli_query($cont,$sql)){
    echo "data berhasil";
}