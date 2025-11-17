<?php 
    $host = "localhost";
    $username = "root";
    $pw = "";
    $db = "reporting";
    try{
         $conn = mysqli_connect($host, $username, $pw, $db);
    if(!$conn){
        die("Koneksi gagal: ". mysqli_connect_error());
    }
    } catch (Exception $e){
        echo "Koneksi Gagal: " . $e->getMessage();
    }
?>