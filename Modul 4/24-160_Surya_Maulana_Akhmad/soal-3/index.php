<?php
// File: index.php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require 'validate.inc';

    // Panggil semua fungsi validasi
    validateName($errors, $_POST, 'name');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');
    validateAge($errors, $_POST, 'age');
    validateBirthDate($errors, $_POST, 'birthdate');

    // Jika ada error
    if ($errors) {
        echo '<h2 style="color:red;">Form Invalid, perbaiki error berikut:</h2>';
        echo '<ul>';
        foreach ($errors as $field => $error) {
            echo "<li><strong>$field</strong> : $error</li>";
        }
        echo '</ul>';
        include 'form.inc';
    } else {
        echo '<h2 style="color:green;">Form berhasil dikirim tanpa error!</h2>';
        echo '<h3>Data Mahasiswa:</h3>';
        echo '<ul>';
        echo '<li>Nama: ' . htmlspecialchars($_POST['name']) . '</li>';
        echo '<li>Email: ' . htmlspecialchars($_POST['email']) . '</li>';
        echo '<li>Umur: ' . htmlspecialchars($_POST['age']) . '</li>';
        echo '<li>Tanggal Lahir: ' . htmlspecialchars($_POST['birthdate']) . '</li>';
        echo '</ul>';
    }
} else {
    include 'form.inc';
}
