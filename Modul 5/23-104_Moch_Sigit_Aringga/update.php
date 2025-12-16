<?php
require_once "konek.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM supplier WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $telp = $row['telp'];
        $alamat = $row['alamat'];
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location='read.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location='read.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $alamat = $_POST["alamat"];

    $update = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id";

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='read.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Master Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="text-center text-primary mb-4">Edit Data Master Supplier</h3>

            <form method="POST" action="">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($nama) ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                    <div class="col-sm-10">
                        <input type="text" name="telp" id="telp" class="form-control" value="<?= htmlspecialchars($telp) ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat" id="alamat" class="form-control" value="<?= htmlspecialchars($alamat) ?>" required>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success me-2">Update</button>
                    <a href="read.php" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
