<?php 
$localhost = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "store"; 
$con = mysqli_connect($localhost, $username, $password, $dbname); 

$hapus =  $_GET['hapus']; 
var_dump($hapus);   
$query = mysqli_query($con, "DELETE FROM supplier WHERE id = '$hapus'" 
); 
if($query){ 
    echo "brhsl"; 
}else { 
    echo "gagal"; 
} 