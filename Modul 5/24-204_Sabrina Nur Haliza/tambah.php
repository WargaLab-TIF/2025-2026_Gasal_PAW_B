<?php
include 'koneksi.php';
$error = "";

if (isset($_POST['simpan'])) {
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    // Validasi kosong
    if (empty($nama) || empty($telp) || empty($alamat)) {
        $error = "Semua field wajib diisi!";
    }
    // Validasi format telepon
    elseif (!preg_match("/^[0-9+\-\s]{6,20}$/", $telp)) {
        $error = "Nomor telepon tidak valid!";
    }
    else {
        // Sanitasi data
        $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($nama));
        $telp = mysqli_real_escape_string($koneksi, htmlspecialchars($telp));
        $alamat = mysqli_real_escape_string($koneksi, htmlspecialchars($alamat));

        $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";
        if (mysqli_query($koneksi, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            $error = "Gagal menyimpan data: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Supplier</title>
</head>
<body>
    <h2 align="center">Tambah Data Master Supplier Baru</h2>

    <?php if ($error): ?>
        <p style="color:red; text-align:center;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" align="center">
        <input type="text" name="nama" placeholder="Nama" required><br><br>
        <input type="text" name="telp" placeholder="Telp" required><br><br>
        <input type="text" name="alamat" placeholder="Alamat" required><br><br>
        <input type="submit" name="simpan" value="Simpan">
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
