<?php
require_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $id =  $_POST['id'];
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id=$id";
    mysqli_query($koneksi, $sql);

    header("Location: tampil.php");
    exit();
} else if (!isset($_GET['id'])) {
    header("Location: tampil.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM supplier where id=$id";
$query = mysqli_query($koneksi, $sql);

$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Master Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="border-bottom pb-3 mb-4">
            <h1 class="h3 mb-0 text-info">Edit Data Master Supplier</h1>
        </div>  
        <form method="post">
            <input type="number" name="id" value="<?php echo $row['id']; ?>" hidden>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama :</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">Telp :</label>
                <input type="text" name="telp" class="form-control" value="<?php echo $row['telp']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat :</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" name="submit" class="btn btn-success text-white">Simpan</button>
                <a href="tampil.php" class="btn btn-danger text-white">Batal</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>