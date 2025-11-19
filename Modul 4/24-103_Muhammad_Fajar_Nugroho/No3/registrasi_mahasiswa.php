<?php
require_once 'validate_mahasiswa.inc';
$errors = array();
$nim = $nama = $email = $password = $konfirmasi_password = '';

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];
    $data_to_validate = [
        'nim' => $nim,
        'nama' => $nama,
        'email' => $email,
        'password' => $password,
        'konfirmasi_password' => $konfirmasi_password,
    ];
    validateFormMahasiswa($errors, $data_to_validate);
    
    if ($errors) {
        include 'form_mahasiswa.inc';
    } else {
        echo "<h1>Registrasi Mahasiswa Berhasil!</h1>";
        echo "<p>Data untuk NIM " . htmlspecialchars($nim) . " telah tervalidasi.</p>";
        
        $nim = $nama = $email = $password = $konfirmasi_password = '';
        
        echo "<hr>Silakan isi form lagi di bawah ini untuk mendaftarkan mahasiswa lain.";
        include 'form_mahasiswa.inc';
    }

} else {
    include 'form_mahasiswa.inc';
}
?>
