<?php
include 'config.php';
include '../../auth.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM pelanggan WHERE id=$id");

header("Location: index.php");
