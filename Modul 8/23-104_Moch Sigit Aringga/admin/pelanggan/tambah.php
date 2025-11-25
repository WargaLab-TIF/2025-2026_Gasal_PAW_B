<?php include 'config.php'; ?>
<?php include '../header.php'; ?>
<?php include '../../auth.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<div class="container col-md-6">

    <div class="card shadow-sm p-4">
        <h4 class="mb-3">Tambah Pelanggan</h4>

        <?php
        if(isset($_POST['submit'])){
            mysqli_query($conn, "INSERT INTO pelanggan VALUES (
                NULL,
                '$_POST[nama]',
                '$_POST[jenis_kelamin]',
                '$_POST[telp]',
                '$_POST[alamat]'
            )");

            header("Location: index.php");
        }
        ?>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="text" name="telp" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>

    </div>

</div>

</body>
</html>
