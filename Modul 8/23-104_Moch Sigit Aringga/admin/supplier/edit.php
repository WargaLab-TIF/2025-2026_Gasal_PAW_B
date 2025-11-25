<?php 
include 'config.php';
include '../header.php';
include '../../auth.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM supplier WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])){
    mysqli_query($conn, "UPDATE supplier SET 
        nama='$_POST[nama]',
        telp='$_POST[telp]',
        alamat='$_POST[alamat]',
        email='$_POST[email]'
        WHERE id=$id");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eef1f6;
            font-family: "Segoe UI", sans-serif;
        }
        .card {
            border-radius: 14px;
            border: none;
        }
        .card-title {
            font-weight: 600;
            color: #333;
        }
        .form-label {
            font-weight: 500;
            color: #444;
        }
        .btn-primary {
            border-radius: 8px;
            padding: 10px 20px;
        }
        .btn-secondary {
            border-radius: 8px;
            padding: 10px 20px;
        }
        .container-box {
            max-width: 650px;
            margin: auto;
            margin-top: 60px;
        }
    </style>
</head>
<body>

<div class="container-box">
    <div class="card shadow-sm p-4">
        <h3 class="text-center card-title mb-4">Edit Data Supplier</h3>

        <form action="" method="POST">

            <div class="mb-3">
                <label class="form-label">Nama Supplier</label>
                <input type="text" name="nama" class="form-control form-control-lg"
                       value="<?= $row['nama'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">No. Telepon</label>
                <input type="text" name="telp" class="form-control form-control-lg"
                       value="<?= $row['telp'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control form-control-lg" rows="3"
                          required><?= $row['alamat'] ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control form-control-lg"
                       value="<?= $row['email'] ?>" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="index.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>
