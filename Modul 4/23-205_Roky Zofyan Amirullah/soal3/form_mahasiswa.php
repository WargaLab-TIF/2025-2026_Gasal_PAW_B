<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Mahasiswa</title>
</head>
<body>
    <h1>Form Pendaftaran Mahasiswa</h1>
    <?php
    $errors = array();

    if (isset($_POST['submit']))
    {
        require 'validate_mhs.inc';
        
        validateNama($errors, $_POST, 'nama');
        validateNIM($errors, $_POST, 'nim');
        validateEmail($errors, $_POST, 'email');
        validatePassword($errors, $_POST, 'password');

        if ($errors)
        {
            echo '<h3 style="color: red;">Harap perbaiki error berikut:</h3>';
            echo '<ul>';
            foreach ($errors as $field => $error)
                echo "<li><strong>$field</strong>: $error</li>";
            echo '</ul>';
            
            echo '<form action="form_mahasiswa.php" method="POST">';
            include 'form_mhs.inc';
            echo '</form>';
        } 
        else 
        {
            echo '<h3 style="color: green;">Registrasi Berhasil!</h3>';
            echo "<p>Selamat datang, " . htmlspecialchars($_POST['nama']) . "!</p>";
        }
    } 
    else 
    {
        echo '<form action="form_mahasiswa.php" method="POST">';
        include 'form_mhs.inc';
        echo '</form>';
    }
    ?>
</body>
</html>