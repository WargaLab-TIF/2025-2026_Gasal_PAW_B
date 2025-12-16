<?php
// ---------------------------
// TUGAS 1 : Pemrosesan Form
// ---------------------------

// (No. 7) Memanggil file eksternal form.inc & validate.inc
include('form.inc');     // berisi fungsi untuk menampilkan form
include('validate.inc'); // berisi fungsi untuk validasi input

// (No. 1) Deklarasi variabel untuk menyimpan input form
$nama = $alamat = $email = $gender = $tanggal_lahir = $password = "";
$errors = [];

// (No. 2) Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // (No. 3) Ambil data dari form menggunakan metode POST
    $nama          = $_POST['nama'] ?? '';
    $alamat        = $_POST['alamat'] ?? '';
    $email         = $_POST['email'] ?? '';
    $gender        = $_POST['gender'] ?? '';
    $tanggal_lahir = $_POST['tanggal_lahir'] ?? '';
    $password      = $_POST['password'] ?? ''; // Tambahan field password

    // (No. 4–6) Lakukan validasi menggunakan fungsi validateForm() dari file validate.inc
    $errors = validateForm($nama, $alamat, $email, $gender, $tanggal_lahir, $password);

    // (No. 9) Jika tidak ada error, tampilkan hasil input user
    if (empty($errors)) {
        echo "<h2>Data yang Anda Isi</h2>";
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        echo "<tr><td><b>Nama</b></td><td>$nama</td></tr>";
        echo "<tr><td><b>Alamat</b></td><td>$alamat</td></tr>";
        echo "<tr><td><b>Email</b></td><td>$email</td></tr>";
        echo "<tr><td><b>Jenis Kelamin</b></td><td>$gender</td></tr>";
        echo "<tr><td><b>Tanggal Lahir</b></td><td>$tanggal_lahir</td></tr>";
        echo "<tr><td><b>Password</b></td><td>".str_repeat('*', strlen($password))."</td></tr>"; // tidak menampilkan password asli
        echo "</table>";
        echo "<p style='color: green;'><b>Form berhasil dikirim tanpa kesalahan.</b></p>";

    } else {
        // (No. 8) Jika ada error, tampilkan kembali form dengan pesan error
        displayForm($nama, $alamat, $email, $gender, $tanggal_lahir, $password, $errors);
    }

} else {
    // (No. 5) Jika halaman baru dibuka, tampilkan form kosong
    displayForm($nama, $alamat, $email, $gender, $tanggal_lahir, $password, $errors);
}
?>
