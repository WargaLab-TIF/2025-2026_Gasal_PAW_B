<?php
require_once "koneksi.php";
require_once "functions.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama   = $_POST['nama'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];

    validateName($errors, $_POST, 'nama');
    validateTelp($errors, $_POST, 'telp');
    validateAlamat($errors, $_POST, 'alamat');

    if (empty($errors)) {

        $sql = "INSERT INTO supplier (nama, telp, alamat)
                VALUES ('$nama', '$telp', '$alamat')";

        if (mysqli_query($conn, $sql)) {
            header("Location: read.php");
            exit;
        } else {
            echo "Gagal menambah data: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Data Supplier</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Tambah Data Master Supplier Baru</h2>

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
        <input type="text" name="nama" placeholder="Nama" 
               value="<?= $_POST['nama'] ?? '' ?>"><br>

        <label>Telepon</label>
        <input type="text" name="telp" placeholder="Telepon"
               value="<?= $_POST['telp'] ?? '' ?>"><br>

        <label>Alamat</label>
        <input type="text" name="alamat" placeholder="Alamat"
               value="<?= $_POST['alamat'] ?? '' ?>"><br>

        <button type="submit" class="btn btn-green">Simpan</button>
        <a href="read.php" class="btn btn-red">Batal</a>
    </form>
</body>
</html>
