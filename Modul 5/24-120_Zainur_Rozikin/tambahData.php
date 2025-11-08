<?php 
$localhost = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "store"; 
$con = mysqli_connect($localhost, $username, $password, $dbname); 

if (isset($_POST['simpan'])) { 
    $nama = $_POST['nama']; 
    $telp = $_POST['telp']; 
    $alamat = $_POST['alamat']; 
    $query = mysqli_query($con, "INSERT INTO supplier values('', '$nama', '$telp', '$alamat')"); 

    echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
}elseif (isset ($_POST['batal'])){ 
    header("location: index.php"); 
}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Tambah Data Supplier</title> 

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}
.container {
    width: 60%;
    margin: 40px auto;
    background: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
}

h2 {
    font-size: 24px;
    color: #007bff;
    margin-bottom: 20px;
    border-bottom: 2px solid #e9ecef;
    padding-bottom: 10px;
}

table {
    width: 100%;
}

td {
    padding: 10px 0;
    font-size: 16px;
}

input[type="text"], input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    font-size: 15px;
}

button {
    padding: 8px 15px;
    border: none;
    font-size: 15px;
    cursor: pointer;
    border-radius: 5px;
}

#simpan {
    background-color: #4CAF50;
    color: white;
    margin-right: 5px;
}
#simpan:hover {
    background-color: #45a049;
}

#batal {
    background-color: #d9534f;
    color: white;
}
#batal:hover {
    background-color: #c9302c;
}
</style>
</head>

<body>
<div class="container">
    <h2>Tambah Data Master Supplier Baru</h2>

    <form action="" method="post"> 
        <table>
            <tr> 
                <td><label for="nama">Nama</label></td>
            </tr>
            <tr>
                <td><input type="text" name="nama" id="nama" placeholder="Nama" required></td> 
            </tr>

            <tr> 
                <td><label for="telp">Telp</label></td>
            </tr>
            <tr>
                <td><input type="number" name="telp" id="telp" placeholder="telp" required></td> 
            </tr>

            <tr> 
                <td><label for="alamat">Alamat</label></td>
            </tr>
            <tr>
                <td><input type="text" name="alamat" id="alamat" placeholder="alamat" required></td> 
            </tr>

            <tr> 
                <td>
                    <button type="submit" id="simpan" name="simpan">Simpan</button> 
                    <button type="submit" id="batal" name="batal">Batal</button> 
                </td> 
            </tr> 
        </table> 
    </form>
</div>
</body>
</html>