<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "tpp6";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $pass, $db);
    $conn->set_charset("utf8mb4");
} catch (Exception $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>