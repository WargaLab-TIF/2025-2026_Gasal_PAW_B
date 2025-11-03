<?php
include 'koneksi.php';

$id = $_GET['id']; 
$query = mysqli_query($cont, "SELECT * FROM supplier WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

$nama = $data['nama'];
$telp = $data['telp'];
$alamat = $data['alamat'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    if (!empty($nama) && !empty($telp) && !empty($alamat)) {
        $update = mysqli_query($cont, "UPDATE supplier SET 
                                        nama='$nama', 
                                        telp='$telp', 
                                        alamat='$alamat' 
                                        WHERE id='$id'");
        if ($update) {
            header("Location: Tugas-1.php");
            exit;
        } else {
            echo "Gagal mengupdate data: " . mysqli_error($cont);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Master Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        .container {
            width: 40%;
            margin: 50px auto;
            background: white;
            padding: 25px 35px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #337ab7;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group label {
            width: 100px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group textarea {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group textarea {
            height: 60px;
            resize: none;
        }
        .btn-group {
            margin-top: 15px;
            margin-left: 100px;
        }
        .btn {
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-green {
            background-color: #4CAF50;
            margin-right: 10px;
        }
        .btn-green:hover {
            background-color: #45a049;
        }
        .btn-red {
            background-color: #d9534f;
        }
        .btn-red:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Data Master Supplier</h2>

    <form method="POST" action="">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>">
        </div>

        <div class="form-group">
            <label>Telp</label>
            <input type="text" name="telp" value="<?= htmlspecialchars($telp) ?>">
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat"><?= htmlspecialchars($alamat) ?></textarea>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-green">Update</button>
            <a href="Tugas-1.php" class="btn btn-red">Batal</a>
        </div>
    </form>
</div>

</body>
</html>
