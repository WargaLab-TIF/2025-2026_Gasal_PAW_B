<?php
include 'koneksi.php';

$nama = $telp = $alamat = "";
$namaErr = $telpErr = $alamatErr = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nama"])) {
        $namaErr = "Nama harus diisi!";
    } else {
        $nama = trim($_POST["nama"]);
    }

    if (empty($_POST["telp"])) {
        $telpErr = "Nomor telepon harus diisi!";
    } elseif (!preg_match("/^[0-9]{8,15}$/", $_POST["telp"])) {
        $telpErr = "Nomor telepon harus berupa angka (8-15 digit)!";
    } else {
        $telp = $_POST["telp"];
    }

    if (empty($_POST["alamat"])) {
        $alamatErr = "Alamat harus diisi!";
    } else {
        $alamat = trim($_POST["alamat"]);
    }

    if (empty($namaErr) && empty($telpErr) && empty($alamatErr)) {
        $query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
        if (mysqli_query($cont, $query)) {
            header("Location: Tugas-1.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($cont);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Supplier</title>
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
            color: #333;
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
        .error {
            color: red;
            font-size: 13px;
            margin-left: 100px;
        }
        .btn-group {
            margin-top: 15px;
            text-align: left;
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
    <h2>Tambah Data Supplier</h2>

    <form method="POST" action="">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>">
        </div>
        <span class="error"><?= $namaErr ?></span>

        <div class="form-group">
            <label>Telp</label>
            <input type="text" name="telp" value="<?= htmlspecialchars($telp) ?>">
        </div>
        <span class="error"><?= $telpErr ?></span>

        <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat"><?= htmlspecialchars($alamat) ?></textarea>
        </div>
        <span class="error"><?= $alamatErr ?></span>

        <div class="btn-group">
            <button type="submit" class="btn btn-green">Simpan</button>
            <a href="Tugas-1.php" class="btn btn-red">Batal</a>
        </div>
    </form>
</div>

</body>
</html>
