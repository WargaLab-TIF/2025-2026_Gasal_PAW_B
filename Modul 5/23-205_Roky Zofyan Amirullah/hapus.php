<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM supplier WHERE id = ?";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id); 
        
        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php?status=hapus_sukses");
            exit();
        } else {
            echo "Error menghapus data: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
} else {
    header("Location: index.php");
    exit();
}
?>