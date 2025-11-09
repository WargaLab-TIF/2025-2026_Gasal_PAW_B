<?php
require_once "koneksi.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    $id = $_GET['id'];

    $sql = "DELETE FROM supplier WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: Tugas-1.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: Tugas-1.php");
    exit;
}


mysqli_close($conn);

?>