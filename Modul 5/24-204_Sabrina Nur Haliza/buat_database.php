<?php
// Konfigurasi koneksi ke MySQL
$host = "localhost";  // Alamat server database (biasanya localhost)
$user = "root";       // Username untuk login ke MySQL
$pass = "";           // Password MySQL (kosong untuk default di XAMPP/Laragon)

// Koneksi ke MySQL tanpa memilih database terlebih dahulu
$koneksi = mysqli_connect($host, $user, $pass);

// Cek apakah koneksi berhasil
if (!$koneksi) {
    // Jika gagal, hentikan program dan tampilkan pesan error
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk membuat database dengan nama 'modul5_data' jika belum ada
$sql = "CREATE DATABASE IF NOT EXISTS modul5_data";

// Eksekusi query dan cek hasilnya
if (mysqli_query($koneksi, $sql)) {
    echo "✅ Database 'modul5_data' berhasil dibuat (atau sudah ada).";
} else {
    echo "❌ Gagal membuat database: " . mysqli_error($koneksi);
}

// Tutup koneksi ke MySQL
mysqli_close($koneksi);
?>
