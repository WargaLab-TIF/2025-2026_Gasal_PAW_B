<?php
require "koneksi.php";

if (isset($_GET['no_nota'])) {

    $no_nota = $_GET['no_nota'];
    $delete_barang = mysqli_query($conn, "DELETE FROM barang where no_nota = $no_nota");
    $delete_nota = mysqli_query($conn, "DELETE FROM nota WHERE no_nota = $no_nota");

    if ($delete_nota) {
        header("Location: tabel_nota.php");
        exit();
    } else {
        echo "Buku dengan ID = $no_nota gagal dihapus: " . mysqli_error($conn);
    }
} else {
    header("Location: tabel_nota.php");
    exit();
}
?>