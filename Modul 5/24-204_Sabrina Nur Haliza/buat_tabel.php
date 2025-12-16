<?php
$koneksi = mysqli_connect("localhost", "root", "", "modul5_data");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS supplier (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    telp VARCHAR(20) NOT NULL,
    alamat VARCHAR(255) NOT NULL
)";

if (mysqli_query($koneksi, $sql)) {
    echo "✅ Tabel 'supplier' berhasil dibuat (atau sudah ada).";
} else {
    echo "❌ Gagal membuat tabel: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
