<?php
// Konfigurasi koneksi ke database
$host = "localhost";  // Alamat server database (biasanya localhost)
$user = "root";       // Username MySQL (default di XAMPP/Laragon biasanya 'root')
$pass = "";           // Password MySQL (kosong untuk default)
$db   = "modul5_data"; // Nama database yang akan digunakan

// Membuat koneksi ke MySQL dengan database yang ditentukan
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Mengecek apakah koneksi berhasil
if (!$koneksi) {
    // Jika gagal, hentikan eksekusi dan tampilkan pesan error
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
