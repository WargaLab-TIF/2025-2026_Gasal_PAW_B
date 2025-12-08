<?php
// Membuat koneksi ke database 'modul5_data'
$koneksi = mysqli_connect("localhost", "root", "", "modul5_data");

// Mengecek apakah koneksi berhasil
if (!$koneksi) {
    // Jika gagal, hentikan program dan tampilkan pesan error
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk membuat tabel 'supplier' jika belum ada
$sql = "CREATE TABLE IF NOT EXISTS supplier (
    id INT AUTO_INCREMENT PRIMARY KEY,   // Kolom id: bertipe integer, otomatis bertambah, dan jadi primary key
    nama VARCHAR(100) NOT NULL,          // Kolom nama: teks maksimal 100 karakter, wajib diisi
    telp VARCHAR(20) NOT NULL,           // Kolom telp: teks maksimal 20 karakter, wajib diisi
    alamat VARCHAR(255) NOT NULL         // Kolom alamat: teks maksimal 255 karakter, wajib diisi
)";

// Menjalankan query untuk membuat tabel
if (mysqli_query($koneksi, $sql)) {
    echo "✅ Tabel 'supplier' berhasil dibuat (atau sudah ada).";
} else {
    echo "❌ Gagal membuat tabel: " . mysqli_error($koneksi);
}

// Menutup koneksi ke database
mysqli_close($koneksi);
?>
