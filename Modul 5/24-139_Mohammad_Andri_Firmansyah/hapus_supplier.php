<?php
session_start();
require_once 'includes/hubung.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $hapus = mysqli_query($conn, "DELETE FROM supplier WHERE id = $id");

    if ($hapus) {
        $_SESSION['sukses'] = "Data supplier berhasil dihapus!";
    } else {
        $_SESSION['error'] = "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

header("Location: supplier.php");
exit;

?>