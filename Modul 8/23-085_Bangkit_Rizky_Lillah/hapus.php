<?php
include 'koneksi.php';

$id = $_GET['id'] ?? 0;

mysqli_query($conn, "DELETE FROM user WHERE id_user = $id");

header("Location: master1.php");
exit;
?>
