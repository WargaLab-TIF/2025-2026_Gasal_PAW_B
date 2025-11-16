<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $nama_pelanggan = $_POST['nama_pelanggan'];

    $query = "INSERT INTO nota (tanggal, nama_pelanggan,total) VALUES ('$tanggal', '$nama_pelanggan',0)";
    if (mysqli_query($conn, $query)) {
        $no_nota = mysqli_insert_id($conn);
        header("Location: form_beli.php?no_nota=$no_nota");
        exit;
    } else {
        echo "Gagal menyimpan nota: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a href="tabel_barang.php">Lihat Tabel Barang</a>
        <a href="tabel_nota.php">Lihat Tabel Nota</a>
        <a href="form_nota.php" class="active">Beli Baranag</a>
    </nav>

    <div class="container">
        <h2>Form Nota</h2>
        <form method="post">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" required>

            <label for="nama_pelanggan"">Nama pelanggan:</label>
            <input type=" text" name="nama_pelanggan"" id=" nama_pelanggan" required>

                <button type="submit" name="submit"> Simpan</button>
        </form>
    </div>
</body>

</html>