<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'validate.inc';

    validateName($errors, $_POST, 'nama');
    validateEmail($errors, $_POST, 'email');
    validateNIM($errors, $_POST, 'nim');
    validatePassword($errors, $_POST, 'password');
    validateDateField($errors, $_POST, 'tgl_lahir');

    if ($errors) {
        include 'formMahasiswa.inc';
    } else {
        echo "<h2>Data Mahasiswa Berhasil Divalidasi!</h2>";
        echo "<b>Nama:</b> " . htmlspecialchars(strtoupper($_POST['nama'])) . "<br>";
        echo "<b>Email:</b> " . htmlspecialchars(strtolower($_POST['email'])) . "<br>";
        echo "<b>NIM:</b> " . htmlspecialchars($_POST['nim']) . "<br>";
        echo "<b>Tanggal Lahir:</b> " . htmlspecialchars($_POST['tgl_lahir']) . "<br>";
        echo "<b>Password:</b> " . str_repeat('*', strlen($_POST['password'])) . "<br>";
    }
} else {
    include 'formMahasiswa.inc';
}
?>
