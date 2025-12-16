<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = intval($_GET['id']);
$result = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");
if (mysqli_num_rows($result) == 0) {
    die("Data tidak ditemukan!");
}
$data = mysqli_fetch_assoc($result);
$error = "";

if (isset($_POST['update'])) {
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    if (empty($nama) || empty($telp) || empty($alamat)) {
        $error = "Semua field wajib diisi!";
    } elseif (!preg_match("/^[0-9+\-\s]{6,20}$/", $telp)) {
        $error = "Nomor telepon tidak valid!";
    } else {
        $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($nama));
        $telp = mysqli_real_escape_string($koneksi, htmlspecialchars($telp));
        $alamat = mysqli_real_escape_string($koneksi, htmlspecialchars($alamat));

        $update = mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");
        if ($update) {
            header("Location: index.php");
            exit;
        } else {
            $error = "Gagal memperbarui data: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Supplier</title>
</head>
<body>
    <h2 align="center">Edit Data Master Supplier</h2>

    <?php if ($error): ?>
        <p style="color:red; text-align:center;"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST" align="center">
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required><br><br>
        <input type="text" name="telp" value="<?= htmlspecialchars($data['telp']) ?>" required><br><br>
        <input type="text" name="alamat" value="<?= htmlspecialchars($data['alamat']) ?>" required><br><br>
        <input type="submit" name="update" value="Update">
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
