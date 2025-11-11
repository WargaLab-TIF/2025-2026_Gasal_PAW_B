<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 1. Validasi nama (regex)
    if (empty($_POST['nama']) || !preg_match("/^[A-Za-z\s'-]+$/", $_POST['nama'])) {
        $errors['nama'] = "Nama hanya boleh huruf dan spasi.";
    }

    // 2. Validasi email (filter + regex)
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    }

    // 3. Validasi password (minimal 8 karakter, 1 huruf besar & 1 angka)
    if (empty($_POST['password']) || !preg_match("/^(?=.*[A-Z])(?=.*\d).{8,}$/", $_POST['password'])) {
        $errors['password'] = "Password minimal 8 karakter, mengandung huruf besar dan angka.";
    }

    // 4. Validasi tanggal lahir
    if (!empty($_POST['tgl_lahir'])) {
        $tgl = explode("-", $_POST['tgl_lahir']);
        if (!checkdate($tgl[1], $tgl[2], $tgl[0])) {
            $errors['tgl_lahir'] = "Tanggal lahir tidak valid.";
        }
    } else {
        $errors['tgl_lahir'] = "Tanggal lahir wajib diisi.";
    }

    // Hasil validasi
    if ($errors) {
        echo "<h3>Terjadi Kesalahan:</h3>";
        foreach ($errors as $field => $msg) {
            echo "<b>$field</b>: $msg<br>";
        }
        echo "<br><a href='form_mahasiswa.php'>Kembali ke Form</a>";
    } else {
        echo "<h3>Form Submitted Successfully with No Error!</h3>";
        echo "Nama: " . htmlspecialchars($_POST['nama']) . "<br>";
        echo "Email: " . htmlspecialchars($_POST['email']) . "<br>";
        echo "Tanggal Lahir: " . htmlspecialchars($_POST['tgl_lahir']);
    }
}
?>
