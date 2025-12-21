<?php
require_once "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM supplier WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: read.php");
        exit;
    }else {
        echo "Gagal menghapus data";
    }
}
