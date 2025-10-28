<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>

    <?php
    require 'validate.inc';
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        validateName($errors, $_POST, 'nama');
        validateNIM($errors, $_POST, 'nim');
        validateEmail($errors, $_POST, 'email');
        validatePassword($errors, $_POST, 'password');
        validateTanggal($errors, $_POST, 'tanggal');
        validateIPK($errors, $_POST, 'ipk');

        if ($errors) {
            echo "<h3 style='color:red;'>Periksa kembali input berikut:</h3><ul>";
            foreach ($errors as $msg) {
                echo "<li>$msg</li>";
            }
            echo "</ul>";
            include 'form.inc';
        } else {
            echo "<h3 style='color:green;'>Data berhasil dikirim!</h3>";
            echo "<p><b>Nama:</b> {$_POST['nama']}</p>";
            echo "<p><b>NIM:</b> {$_POST['nim']}</p>";
            echo "<p><b>Email:</b> {$_POST['email']}</p>";
            echo "<p><b>Tanggal Lahir:</b> {$_POST['tanggal']}</p>";
            echo "<p><b>IPK:</b> {$_POST['ipk']}</p>";
        }
    } else {
        include 'form.inc';
    }
    ?>
</body>
</html>