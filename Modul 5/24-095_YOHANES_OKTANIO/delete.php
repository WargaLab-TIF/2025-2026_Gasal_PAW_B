<?php
require_once "koneksi.php";
function clearText($text)
{
    return htmlspecialchars(stripslashes(trim($text)));
}

$id = clearText($_GET['id']);

if ($id != "") {
    $SQL = "DELETE FROM supplier WHERE id=$id";
    mysqli_query($conn,$SQL);
    header("Location: index.php");
}