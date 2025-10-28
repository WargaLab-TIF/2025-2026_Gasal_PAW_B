<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Isian Data Pribadi</title>
</head>
<body>
    <h2>Hasil Isian Data Pribadi</h2>

    <?php
    require 'validate.inc';

    // =====================================================
    // 1️⃣ Tampilkan hasil data dari form (kalau sudah dikirim)
    // =====================================================
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama       = $_POST['nama']       ?? '(tidak diisi)';
        $email      = $_POST['email']      ?? '(tidak diisi)';
        $prodi      = $_POST['prodi']      ?? '(tidak diisi)';
        $alamat     = $_POST['alamat']     ?? '(tidak diisi)';
        $provinsi   = $_POST['provinsi']   ?? '(tidak diisi)';
        $gender     = $_POST['gender']     ?? '(tidak diisi)';
        $mahasiswa  = isset($_POST['mahasiswa']) ? 'Ya' : 'Tidak';

        echo "<p><b>Nama Lengkap:</b> $nama</p>";
        echo "<p><b>Email:</b> $email</p>";
        echo "<p><b>Program Studi:</b> $prodi</p>";
        echo "<p><b>Alamat:</b> $alamat</p>";
        echo "<p><b>Provinsi:</b> $provinsi</p>";
        echo "<p><b>Jenis Kelamin:</b> $gender</p>";
        echo "<p><b>Mahasiswa:</b> $mahasiswa</p>";
        echo '<p><a href="DataForm.html">« Kembali ke Form</a></p>';
    }
    $errors = array();

    if (isset($_POST['nama'])) {
        require 'validate.inc';
        validateName($errors, $_POST, 'nama');

        if ($errors) {
            echo '<h3 style="color:red;">Invalid, correct the following errors:</h3>';
            foreach ($errors as $field => $error) {
                echo ucfirst($field) . " : " . $error . "<br/>";
            }
            include 'form.inc';
        } else {
            echo '<h3 style="color:green;">Form submitted successfully with no errors</h3>';
        }
    } else {
        include 'form.inc';
    }
    ?>
</body>
</html>
