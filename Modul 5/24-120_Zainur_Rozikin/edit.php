<?php 
$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "store"; 
$conn = mysqli_connect($hostname, $username, $password, $dbname); 

if (isset($_GET['id'])) { 
    $id = $_GET['id']; 
    $query = "SELECT * FROM supplier WHERE id = '$id'"; 
    $result = mysqli_query($conn, $query); 
    $supplier = mysqli_fetch_assoc($result); 

    if (!$supplier) { 
        echo "Data tidak ditemukan!"; 
        exit; 
    } 
} else { 
    echo "ID tidak ditemukan!"; 
    exit; 
} 

if (isset($_POST['update'])) { 
    $nama = $_POST['name']; 
    $telp = $_POST['telp']; 
    $alamat = $_POST['alamat']; 

    $updateQuery = "UPDATE supplier SET nama = '$nama', telp = '$telp', alamat = '$alamat' WHERE id = '$id'"; 
    $updateResult = mysqli_query($conn, $updateQuery); 

    if ($updateResult) { 
        header("Location: index.php"); 
        exit; 
    } else { 
        echo "Gagal mengupdate data!"; 
    } 
}elseif(isset($_POST['batal'])){ 
    header("location: index.php"); 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Data Supplier</title>

<style>
body {
    background: #f0f2f5;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container-box {
    background: white;
    width: 60%;
    margin: 50px auto;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    color: #0077b6;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 20px;
    font-weight: bold;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #aaa;
    border-radius: 5px;
    font-size: 16px;
}

.btn {
    padding: 10px 18px;
    margin-right: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
    font-weight: bold;
}

.btn-update {
    background: #2ecc71;
    color: white;
}

.btn-update:hover {
    background: #27ae60;
}

.btn-cancel {
    background: #e74c3c;
    color: white;
}

.btn-cancel:hover {
    background: #c0392b;
}
</style>

</head>
<body>

<div class="container-box">
    <h2>Edit Data Master Supplier</h2>

    <form method="POST" action="">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="<?php echo $supplier['nama']; ?>" required>
        </div>

        <div class="form-group">
            <label>Telp</label>
            <input type="text" name="telp" value="<?php echo $supplier['telp']; ?>" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?php echo $supplier['alamat']; ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-update">Update</button>
        <button type="submit" name="batal" class="btn btn-cancel">Batal</button>
    </form>
</div>

</body>
</html>