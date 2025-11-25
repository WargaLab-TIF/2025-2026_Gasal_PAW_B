<?php 
include 'config.php';
include '../header.php';
include '../../auth.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])){
    mysqli_query($conn, "UPDATE pelanggan SET 
        nama='$_POST[nama]',
        jenis_kelamin='$_POST[jenis_kelamin]',
        telp='$_POST[telp]',
        alamat='$_POST[alamat]'
        WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pelanggan</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<div class="container col-md-6">

    <div class="card shadow-sm p-4">
        <h4 class="mb-3">Edit Pelanggan</h4>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option <?= ($row['jenis_kelamin']=="Laki-laki"?"selected":"") ?>>Laki-laki</option>
                    <option <?= ($row['jenis_kelamin']=="Perempuan"?"selected":"") ?>>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="text" name="telp" value="<?= $row['telp'] ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control"><?= $row['alamat'] ?></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-success">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>

        </form>

    </div>

</div>

</body>
</html>
