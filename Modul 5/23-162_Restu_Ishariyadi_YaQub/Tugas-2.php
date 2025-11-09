<?php
require_once "koneksi.php";

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";

    if (mysqli_query($conn, $sql)) {
 
        header("Location: Tugas-1.php");
        exit;
    } else {
        $pesan = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container form-container">
        <h2>Tambah Data Master Supplier Baru</h2>

        <?php if (!empty($pesan)) : ?>
            <div class="pesan-error"><?php echo $pesan; ?></div>
        <?php endif; ?>

        <form action="Tugas-2.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            
            <div class="form-group">
                <label for="telp">Telp</label>
                <input type="text" id="telp" name="telp" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" rows="4" required></textarea>
            </div>
            
            <div class="form-buttons">
                <button type="submit" class="btn btn-simpan">Simpan</button>
                
                <a href="Tugas-1.php" class="btn btn-batal">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>