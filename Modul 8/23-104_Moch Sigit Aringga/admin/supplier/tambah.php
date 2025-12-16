<?php \
include 'config.php';
include '../header.php';
include '../../auth.php';

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];

        mysqli_query($conn, "INSERT INTO supplier (nama, telp, alamat, email) 
                         VALUES('$nama', '$telp', '$alamat', '$email')");

        header("Location: index.php");
    }
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Supplier</title>
</head>

<body>

    <h3>Tambah Supplier</h3>
    <form action="" method="POST">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Telepon:</label><br>
        <input type="text" name="telp" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit" name="submit">Simpan</button>
    </form>

</body>

</html>