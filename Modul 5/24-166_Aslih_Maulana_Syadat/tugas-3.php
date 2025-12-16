<?php
require_once 'koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $query_update = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'";
    mysqli_query($koneksi, $query_update);

    header("location:tugas-1.php");
    exit;
}

$id = $_GET['id'];
$query_select = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");
$data = mysqli_fetch_array($query_select);

if (!$data) {
    header("location:tugas-1.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Supplier</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px; 
        }
        h2 { 
            color: lightblue; 
        }
        form table { 
            border-collapse: collapse; 
        }
        form table td { 
            padding: 5px; 
        }
        form table tr td:first-child { 
            font-weight: bold; 
            padding-right: 10px; 
        }
        input[type=text], textarea {
            width: 300px;
            padding: 8px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid black;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            text-align: center;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            margin-right: 5px;
        }
        .btn-update {
            background-color: green;
            border-color: green;
        }
        .btn-batal {
            background-color: red;
            border-color: red;
        }
    </style>
</head>
<body>

    <h2>Edit Data Master Supplier</h2>

    <form action="tugas-3.php?id=<?php echo $data['id']; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Telp</td>
                <td><input type="text" name="telp" value="<?php echo $data['telp']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat" rows="3"><?php echo $data['alamat']; ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="update" class="btn btn-update">Update</button>
                    <a href="tugas-1.php" class="btn btn-batal">Batal</a>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>