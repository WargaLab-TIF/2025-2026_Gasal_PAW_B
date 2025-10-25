<?php
$errors = [];
$successMessage = '';

if (isset($_POST['submit'])) {
    
    require 'validate.php'; 
    
    validateMahasiswa($errors, $_POST);
    
    if (empty($errors)) {
        $successMessage = '<h1>Data Mahasiswa Berhasil Disimpan!</h1>';
        $successMessage .= '<p>Nama: ' . htmlspecialchars($_POST['nama']) . '</p>';
        $successMessage .= '<p>NIM: ' . htmlspecialchars($_POST['nim']) . '</p>';
        $successMessage .= '<p>Email: ' . htmlspecialchars($_POST['email']) . '</p>';
        $successMessage .= '<p>Tanggal Lahir: ' . htmlspecialchars($_POST['tgl_lahir']) . '</p>';
        $successMessage .= '<p>IPK: ' . htmlspecialchars($_POST['ipk']) . '</p>';
        $successMessage .= '<p>Website: ' . htmlspecialchars($_POST['website'] ?? 'N/A') . '</p>';
        $successMessage .= '<br><a href="index.php">Daftarkan Mahasiswa Lain</a>';
        
        $_POST = [];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 4 - Form Mahasiswa</title>
</head>
<body>
    <div class="container">
        <?php
        if ($successMessage) {
            echo '<div class="success">' . $successMessage . '</div>';
        } else {
            echo '<h1>Form Input Data Mahasiswa</h1>';
            
            if (isset($_POST['submit']) && !empty($errors)) {
                echo '<div class="error-summary"><strong>Terjadi kesalahan:</strong><ul>';
                foreach ($errors as $error) {
                    echo '<li>' . $error . '</li>';
                }
                echo '</ul></div><br>';
            }
            
            include 'form.inc';
        }
        ?>
    </div>
</body>
</html>