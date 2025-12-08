<?php
// Menyertakan file koneksi ke database
include 'koneksi.php';

// Variabel untuk menampung pesan error (jika ada)
$error = "";

// Mengecek apakah tombol "Simpan" ditekan
if (isset($_POST['simpan'])) {
    // Mengambil data dari form dan menghapus spasi di awal/akhir teks
    $nama = trim($_POST['nama']);
    $telp = trim($_POST['telp']);
    $alamat = trim($_POST['alamat']);

    // Validasi: semua field wajib diisi
    if (empty($nama) || empty($telp) || empty($alamat)) {
        $error = "Semua field wajib diisi!";
    }
    // Validasi: format nomor telepon hanya boleh angka, spasi, +, atau -
    elseif (!preg_match("/^[0-9+\-\s]{6,20}$/", $telp)) {
        $error = "Nomor telepon tidak valid!";
    }
    else {
        // Sanitasi input untuk mencegah XSS dan SQL Injection
        $nama   = mysqli_real_escape_string($koneksi, htmlspecialchars($nama));
        $telp   = mysqli_real_escape_string($koneksi, htmlspecialchars($telp));
        $alamat = mysqli_real_escape_string($koneksi, htmlspecialchars($alamat));

        // Query untuk menyimpan data ke tabel supplier
        $sql = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";

        // Menjalankan query
        if (mysqli_query($koneksi, $sql)) {
            // Jika berhasil, kembali ke halaman utama
            header("Location: index.php");
            exit;
        } else {
            // Jika gagal, tampilkan pesan error dari MySQL
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

    <!-- Menampilkan pesan error jika ada -->
    <?php if ($error): ?>
        <p style="color:red; text-align:center;"><?= $error ?></p>
    <?php endif; ?>

    <!-- Form untuk input data supplier -->
    <form method="POST" align="center">
        <input type="text" name="nama" placeholder="Nama" required><br><br>
        <input type="text" name="telp" placeholder="Telp" required><br><br>
        <input type="text" name="alamat" placeholder="Alamat" required><br><br>
        <input type="submit" name="simpan" value="Simpan">
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
