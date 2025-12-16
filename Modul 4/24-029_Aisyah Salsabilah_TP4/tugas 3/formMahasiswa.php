<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'validateMahasiswa.inc';

    validateName($errors, $_POST, 'nama');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');
    validateNIM($errors, $_POST, 'nim');
    validateTanggal($errors, $_POST, 'tanggal');

    if ($errors) {
        echo "<h3>Ada kesalahan pada data yang kamu masukkan:</h3>";
        echo "<ul>";
        foreach ($errors as $field => $error) {
            echo "<li><b>$field</b>: $error</li>";
        }
        echo "</ul>";
        include 'formMahasiswa.inc';
    } else {
        echo "<h3>Data berhasil disubmit tanpa error!</h3>";
        echo "<p>Nama: " . htmlspecialchars($_POST['nama']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p>NIM: " . htmlspecialchars($_POST['nim']) . "</p>";
        echo "<p>Tanggal Lahir: " . htmlspecialchars($_POST['tanggal']) . "</p>";
    }
} else {
    include 'formMahasiswa.inc';
}
?>