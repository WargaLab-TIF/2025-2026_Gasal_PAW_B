<?php
include 'koneksi.php';
$id = $_GET['id'];
$conn->query("DELETE FROM supplier WHERE id = $id");
header("Location: data_supp.php");
exit;
?>
