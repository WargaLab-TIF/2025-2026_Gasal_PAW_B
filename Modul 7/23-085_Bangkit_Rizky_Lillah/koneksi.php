<?php 

    $host = 'localhost';
    $username = 'root';
    $pw = '';
    $db = 'chart_js';

    try {
        $conn = mysqli_connect($host, $username, $pw, $db);
    } catch (Exception $e) {
        echo $e;
    }

?>
