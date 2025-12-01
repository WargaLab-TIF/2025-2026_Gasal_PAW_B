<?php 
    $host = 'localhost';
    $username = 'root';
    $pw = '';
    $db = 'reporting';

    try {
        $conn = mysqli_connect($host, $username, $pw, $db);
    } catch (Exception $e) {
        echo "Koneksi Gagal: " . $e->getMessage();
    }
?>