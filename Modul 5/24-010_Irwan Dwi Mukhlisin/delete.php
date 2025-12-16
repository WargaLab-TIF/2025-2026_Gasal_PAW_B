<?php
include "koneksi.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare(("DELETE FROM supplier WHERE id=?"));
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
header("Location: data.php");
exit;
