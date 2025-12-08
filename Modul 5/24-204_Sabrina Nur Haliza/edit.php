<?php
// Menghubungkan file ini dengan file koneksi ke database
include 'koneksi.php';

// Mengecek apakah parameter 'id' dikirim lewat URL (GET)
if (!isset($_GET['id'])) {
    // Jika tidak ada, hentikan eksekusi dan tampilkan pesan
    die("ID tidak ditemukan.");
}

// Mengamankan nilai ID agar hanya berupa angka (integer)
$id = intval($_GET['id']);

// Mengambil data supplier berdasarkan ID dari database
$result = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id='$id'");

// Jika tidak ditemukan data dengan ID tersebut
if (mysqli_num_rows($result) == 0) {
    die("Data tidak ditemukan!");
}

// Menyimpan hasil query dalam bentuk array asosiatif
$data = mysqli_fetch_assoc($result);

// Variabel untuk menampung pesan error (jika ada)
$error = "";

// Mengecek apakah tombol "Update" sudah ditekan
if (isset($_POST['update'])) {
    // Mengambil dan membersihkan input dari form
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    // Validasi: semua field harus diisi
    if (empty($nama) || empty($telp) || empty($alamat)) {
        $error = "Semua field wajib diisi!";
    }
    // Validasi: format nomor telepon hanya boleh angka, spasi, +, atau -
    elseif (!preg_match("/^[0-9+\-\s]{6,20}$/", $telp)) {
        $error = "Nomor telepon tidak valid!";
    } 
    else {
        // Mencegah serangan XSS dan SQL Injection
        $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($nama));
        $telp = mysqli_real_escape_string($koneksi, htmlspecialchars($telp));
        $alamat = mysqli_real_escape_string($koneksi, htmlspecialchars($alamat));

        // Query untuk memperbarui data supplier berdasarkan ID
        $update = mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");

        // Jika update berhasil, kembali ke halaman utama (index.php)
        if ($update) {
            header("Location: index.php");
            exit;
        } else {
            // Jika gagal, tampilkan pesan error dari MySQL
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

    <!-- Menampilkan pesan error (jika ada) -->
    <?php if ($error): ?>
        <p style="color:red; text-align:center;"><?= $error ?></p>
    <?php endif; ?>

    <!-- Form untuk mengedit data supplier -->
    <form method="POST" align="center">
        <!-- Input nama -->
        <input type="text" name="nama" 
               value="<?= htmlspecialchars($data['nama']) ?>" required><br><br>

        <!-- Input telepon -->
        <input type="text" name="telp" 
               value="<?= htmlspecialchars($data['telp']) ?>" required><br><br>

        <!-- Input alamat -->
        <input type="text" name="alamat" 
               value="<?= htmlspecialchars($data['alamat']) ?>" required><br><br>

        <!-- Tombol untuk menyimpan perubahan -->
        <input type="submit" name="update" value="Update">

        <!-- Tombol batal kembali ke halaman utama -->
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
