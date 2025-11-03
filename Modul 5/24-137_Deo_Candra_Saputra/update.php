<?php
require_once "koneksi.php";
require_once "functions.php";

$errors = [];

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];

$sql    = "SELECT * FROM supplier WHERE id = $id";
$result = mysqli_query($conn, $sql);
$data   = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama   = $_POST['nama'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];

    validateName($errors, $_POST, 'nama');
    validateTelp($errors, $_POST, 'telp');
    validateAlamat($errors, $_POST, 'alamat');

    if (empty($errors)) {
        $update = "UPDATE supplier SET 
                    nama='$nama',
                    telp='$telp',
                    alamat='$alamat'
                   WHERE id=$id";

        if (mysqli_query($conn, $update)) {
            header("Location: read.php");
            exit;
        } else {
            echo "<h1>Update Gagal</h1>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data Supplier</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Edit Data Master Supplier</h2>

    <?php
    if (!empty($errors)) {
        echo "<div style='color:red; margin-bottom:10px;'>";
        foreach ($errors as $err) {
            echo "- $err <br>";
        }
        echo "</div>";
    }
    ?>

    <form action="" method="POST">
        <label>Nama</label>
        <input type="text" name="nama" 
               value="<?= $_POST['nama'] ?? $data['nama']; ?>"><br>

        <label>Telepon</label>
        <input type="text" name="telp" 
               value="<?= $_POST['telp'] ?? $data['telp']; ?>"><br>

        <label>Alamat</label>
        <input type="text" name="alamat" 
               value="<?= $_POST['alamat'] ?? $data['alamat']; ?>"><br>

        <button type="submit" class="btn btn-green">Update</button>
        <a href="read.php" class="btn btn-red">Batal</a>
    </form>
</body>
</html>
