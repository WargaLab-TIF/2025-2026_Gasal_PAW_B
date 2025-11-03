<?php include("config.php"); ?>

<?php
 
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM 4infodata WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

 
if (isset($_POST['update_students'])) {
    $fname = $_POST['fname'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    $query = "UPDATE 4infodata SET nama = '$fname', alamat = '$alamat', telp = '$telp' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        header('Location: index.php?updated=Data Updated Sucessfully');
        exit; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
<form action="update.php?id=<?php echo $id; ?>" method="POST">
    <label for="fname">Nama</label>
    <input type="text" name="fname" value="<?php echo $row['nama']; ?>"> <br>

    <label for="lname">Alamat</label>
    <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"><br>

    <label for="age">Telp</label>
    <input type="text" name="telp" value="<?php echo $row['telp']; ?>"><br>

    <input  class="btn btn-update" type="submit" name="update_students" value="UPDATE">
</form>
    </div>
</body>
</html>
