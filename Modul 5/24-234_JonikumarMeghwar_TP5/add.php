<?php include("config.php") ?> 

<?php

  $error = "";
  if($_SERVER["REQUEST_METHOD"]=== 'POST'){
    $fname = $_POST['fname'];
    $alamat = $_POST['alamat'];
     $telp = $_POST['telp'];

    if(empty($fname) || empty($alamat) || empty($telp)){
      $error = "Please all the blank" ;
   
     }

     else{
         $query = "INSERT INTO 4infodata (nama, alamat, telp) VALUES ('$fname', '$alamat', '$telp')";
        $result = mysqli_query($conn, $query);

        if (!$result){
            die("querry faule".mysqli_error());

        }else{
             header('location:index.php?add=data add sucessfully');
             exit;
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Add new</title>
    <style>
        .formadd{
           margin-top:50px;
            align-item:center;
            justify-content:center;
            display:flex;
           
        }
        form{
            margin-top:20px;
            background-color:skyblue;
              padding:20px;
              border:1px solid black;
              border-radius:10px;
            
        }
      
        .btn {
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            color: white;
        }

        .btn-update {
            background-color: orange;
        }

         

    </style>
</head>

<body>
    <div class="formadd">

<form method="POST">
    <?php 
    if(!empty($error)){
        echo "<div>" .$error . "</div>";
    }
    ?>
    <label for="fname">Nama</label>
    <input type="text" name="fname" > <br>
    <br>
    <label for="alamat">Alamat</label>
    <input type="text" name="alamat" ><br>
    <br>
    <label for="telp">Telp</label>
    <input type="text" name="telp" ><br>
    <br>
    <input  class="btn btn-update" type="submit"   >

</form>
        
    </div>

</body>

</html>
