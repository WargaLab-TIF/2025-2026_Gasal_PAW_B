<?php
require_once "koneksi.php";

$id = $_POST['edit'];
$query = "SELECT * FROM supplier WHERE id = $id";
$result = $connect->query($query);

if($result->num_rows > 0){
    $rows = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="edit_proses.php" method="post">
        <input type="hidden" name="id" value="<?=$id;?>">
        <label for="name">Nama : <input type="text" name="name" required value="<?=$rows['nama'];?>"></label><br>
        <label for="telp">No Telp : <input type="telp" name="telp" required value="<?=$rows['telp'];?>"></label><br>
        <label for="alamat">Alamat : <input type="alamat" name="alamat" required value="<?=$rows['alamat'];?>"></label><br>
        <input type="submit" value="Edit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>