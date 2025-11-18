<?php 

    $host = 'localhost';
    $username = 'root';
    $pw = '';
    $db = 'penjualan_tp5';

    try {
        $conn = mysqli_connect($host, $username, $pw, $db);
    } catch (Exception $e) {
        echo $e;
    }

?>