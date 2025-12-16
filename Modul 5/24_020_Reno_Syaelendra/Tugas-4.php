<?php
// FILE: hapus_supplier.php
// (Logika untuk menghapus data)
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM penjualan_supplier WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: Tugas-5.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} else {
    header("Location: Tugas-1.php");
    exit();
}
?>