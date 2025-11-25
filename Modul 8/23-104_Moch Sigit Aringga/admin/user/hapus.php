<?php 
include '../db.php';
include '../../auth.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM user WHERE id_user=$id");

header("Location: index.php");
?>
