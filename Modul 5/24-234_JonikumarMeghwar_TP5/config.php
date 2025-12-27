<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "paw_mod5";

// Create connection
$conn = mysqli_connect($servername,$username ,$password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
