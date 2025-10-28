<?php
require 'validate.inc';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors['Nama'] = validateName($_POST, 'Nama');
    $errors['email'] = validateEmail($_POST, 'email');
    $errors['password'] = validatePassword($_POST, 'password');
    $errors['tanggal'] = validateDateField($_POST, 'tanggal');

    $errors = array_filter($errors);

    if (empty($errors)) {
        session_start();
        $_SESSION['formData'] = $_POST;
        header("Location: processData.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Validasi Form Mahasiswa</title>
</head>
<body>
    <h2>Form Validasi Data Mahasiswa</h2>
    <?php require 'form.inc'; ?>
</body>
</html>