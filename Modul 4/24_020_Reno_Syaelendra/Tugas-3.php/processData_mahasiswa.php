<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Soal 3 - Eksplorasi lebih lanjut terhadap Validasi Server-side</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background-color: #f9f9f9;
    }
    h1 {
      color: #333;
    }
    h3 {
      margin-top: 0;
    }
    .error {
      color: red;
      background-color: #ffe6e6;
      padding: 10px;
      border-left: 5px solid red;
      margin-bottom: 20px;
    }
    .success {
      color: green;
      background-color: #e6ffe6;
      padding: 10px;
      border-left: 5px solid green;
      margin-bottom: 20px;
    }
    ul {
      background-color: #fff;
      padding: 15px;
      border: 1px solid #ccc;
      list-style-type: none;
    }
    li {
      margin-bottom: 8px;
    }
  </style>
</head>
<body>

<h1>Form Validasi Data Mahasiswa</h1>

<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require 'validate_mahasiswa.inc';

    validasiNama($errors, $_POST, 'nama');
    validasiNIM($errors, $_POST, 'nim');
    validasiPassword($errors, $_POST, 'password');
    validasiAlamat($errors, $_POST, 'alamat', 5);
    validasiTanggalLahir($errors, $_POST, 'tanggal_lahir');
    validasiEmail($errors, $_POST, 'email');
    validasiURL($errors, $_POST, 'url');
    validasiIP($errors, $_POST, 'ip');
    validasiIPK($errors, $_POST, 'ipk');
    validasiProdi($errors, $_POST, 'prodi');
    validasiGender($errors, $_POST, 'gender');  

  if ($errors) {
    echo '<div class="error"><h3>Silakan perbaiki kesalahan berikut:</h3><ul>';
    foreach ($errors as $field => $message) {
      echo '<li><strong>' . htmlspecialchars($field) . '</strong>: ' . htmlspecialchars($message) . '</li>';
    }
    echo '</ul></div>';
    include 'form_mahasiswa.inc';
  } else {
    echo '<div class="success"><h3>Data mahasiswa berhasil dikirim tanpa kesalahan.</h3></div>';
    echo '<h4>Ringkasan Data:</h4>';
    echo '<ul>';
    echo '<li><strong>Nama:</strong> ' . htmlspecialchars($_POST['nama']) . '</li>';
    echo '<li><strong>NIM:</strong> ' . htmlspecialchars($_POST['nim']) . '</li>';
    echo '<li><strong>Email:</strong> ' . htmlspecialchars(strtolower($_POST['email'])) . '</li>';
    echo '<li><strong>Password:</strong> ' . str_repeat('*', strlen($_POST['password'])) . '</li>';
    echo '<li><strong>Tanggal Lahir:</strong> ' . htmlspecialchars($_POST['tanggal_lahir']) . '</li>';
    echo '<li><strong>URL:</strong> ' . htmlspecialchars($_POST['url'] ?? '') . '</li>';
    echo '<li><strong>IP Address:</strong> ' . htmlspecialchars($_POST['ip'] ?? '') . '</li>';
    echo '<li><strong>IPK:</strong> ' . htmlspecialchars($_POST['ipk']) . '</li>';
    echo '<li><strong>Alamat:</strong> ' . nl2br(htmlspecialchars($_POST['alamat'])) . '</li>';
    echo '<li><strong>Program Studi:</strong> ' . htmlspecialchars($_POST['prodi']) . '</li>';
    echo '<li><strong>Gender:</strong> ' . htmlspecialchars($_POST['gender']) . '</li>';
    echo '</ul>';
  }
} else {
  include 'form_mahasiswa.inc';
}
?>

</body>
</html>