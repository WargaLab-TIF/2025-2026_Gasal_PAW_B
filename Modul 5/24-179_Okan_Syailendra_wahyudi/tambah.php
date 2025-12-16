<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Master Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

<div class="container">
    <h3>Tambah Data Master Supplier Baru</h3>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telp</label>
            <input type="text" name="telp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-danger">Batal</a>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];

        $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
        mysqli_query($conn, $sql);

        echo "<script>alert('Data berhasil disimpan'); window.location='index.php';</script>";
    }
    ?>
</div>

</body>
</html>
