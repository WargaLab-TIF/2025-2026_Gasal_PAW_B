<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Validasi Server-side - Data Mahasiswa</title>
</head>
<body>
    <h2>Form Input Data Mahasiswa</h2>

    <?php
    require 'validate.inc';
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        validateName($errors, $_POST, 'nama');
        validateEmail($errors, $_POST, 'email');
        validateNIM($errors, $_POST, 'nim');
        validateTanggal($errors, $_POST, 'tgl_lahir');
        validatePassword($errors, $_POST, 'password');
        validateIPK($errors, $_POST, 'ipk');

        if (empty($errors)) {
            echo "<h3 style='color:green;'>Data berhasil disubmit tanpa error!</h3>";
            echo "<b>Nama:</b> " . htmlspecialchars($_POST['nama']) . "<br>";
            echo "<b>Email:</b> " . htmlspecialchars($_POST['email']) . "<br>";
            echo "<b>NIM:</b> " . htmlspecialchars($_POST['nim']) . "<br>";
            echo "<b>Tanggal Lahir:</b> " . htmlspecialchars($_POST['tgl_lahir']) . "<br>";
            echo "<b>IPK:</b> " . htmlspecialchars($_POST['ipk']) . "<br>";
        } else {
            echo "<h3 style='color:red;'>Terdapat kesalahan input:</h3>";
            include 'form.inc';
        }
    } else {
        include 'form.inc';
    }
    ?>
</body>
</html>