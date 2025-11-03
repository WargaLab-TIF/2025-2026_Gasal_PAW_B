<?php  include('config.php')?>

<?php
if(isset($_GET['id'])){
 $id = $_GET['id'];
    
 $querry = "DELETE FROM 4infodata WHERE id = '$id' ";
 $result = mysqli_query($conn, $querry);
 if (!$result){
    die("Operation failed");
 }
else{
    header('location:index.php?del=Record deleted!');
    exit;
}
}
?>