<?php
require_once 'koneksi.php';

$id = $_GET['id'];

$query_update_barang = "UPDATE barang SET supplier_id = NULL WHERE supplier_id = '$id'";
mysqli_query($koneksi, $query_update_barang);

$query_delete_supplier = "DELETE FROM supplier WHERE id='$id'";
mysqli_query($koneksi, $query_delete_supplier);

header("location:tugas-1.php");
?>