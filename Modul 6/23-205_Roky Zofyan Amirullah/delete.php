<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id_nota = $_GET['id'];
    
    mysqli_begin_transaction($conn);
    
    try {
        $sql_detail = "DELETE FROM detail_barang WHERE id_nota = ?";
        $stmt_detail = mysqli_prepare($conn, $sql_detail);
        mysqli_stmt_bind_param($stmt_detail, "i", $id_nota);
        if (!mysqli_stmt_execute($stmt_detail)) {
            throw new Exception("Gagal menghapus detail barang.");
        }
        
        $sql_master = "DELETE FROM nota WHERE id_nota = ?";
        $stmt_master = mysqli_prepare($conn, $sql_master);
        mysqli_stmt_bind_param($stmt_master, "i", $id_nota);
        if (!mysqli_stmt_execute($stmt_master)) {
            throw new Exception("Gagal menghapus nota.");
        }

        mysqli_commit($conn);
        header("Location: index.php");
        
    } catch (Exception $e) {
        mysqli_rollback($conn);
        echo "Gagal menghapus data: " . $e->getMessage();
    }

} else {
    echo "ID tidak ditemukan.";
    header("Location: index.php");
}
?>