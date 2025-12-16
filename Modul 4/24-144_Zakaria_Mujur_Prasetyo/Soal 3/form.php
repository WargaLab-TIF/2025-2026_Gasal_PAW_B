<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'validate.inc';
    // Jalankan semua validator
    validateNama($errors, $_POST, 'nama');
    validateNIM($errors, $_POST, 'nim');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');
    validateTanggalLahir($errors, $_POST, 'tanggal_lahir');
    validateURL($errors, $_POST, 'url');
    validateIP($errors, $_POST, 'ip');
    validateIPK($errors, $_POST, 'ipk');
    validateAlamat($errors, $_POST, 'alamat', 5);
    validateProdi($errors, $_POST, 'prodi');
    validateGender($errors, $_POST, 'gender');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Soal 3 - Validasi Server-side Lanjutan</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 2rem; }
    fieldset { max-width: 720px; }
    .success { color: #0a7a0a; }
    .errors { color: #b00020; }
  </style>
</head>
<body>
  <h2>Form Input Data Mahasiswa</h2>
  <fieldset>
    <legend>Data Mahasiswa</legend>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <?php if ($errors): ?>
        <div class="errors">
          <strong>Invalid, correct the following errors:</strong><br />
          <?php foreach ($errors as $field => $error): ?>
            <?php echo htmlspecialchars($field), ' ', htmlspecialchars($error), '<br />'; ?>
          <?php endforeach; ?>
        </div>
        <?php include 'form.inc'; ?>
      <?php else: ?>
        <p class="success">Form submitted successfully with no errors</p>
        <h4>Ringkasan (disanitasi)</h4>
        <ul>
          <li>Nama: <?php echo htmlspecialchars($_POST['nama']); ?></li>
          <li>NIM: <?php echo htmlspecialchars($_POST['nim']); ?></li>
          <li>Email: <?php echo htmlspecialchars(strtolower($_POST['email'])); ?></li>
          <li>Tanggal Lahir: <?php echo htmlspecialchars($_POST['tanggal_lahir']); ?></li>
          <li>URL: <?php echo htmlspecialchars($_POST['url'] ?? ''); ?></li>
          <li>IP: <?php echo htmlspecialchars($_POST['ip'] ?? ''); ?></li>
          <li>IPK: <?php echo htmlspecialchars($_POST['ipk']); ?></li>
          <li>Alamat: <?php echo nl2br(htmlspecialchars($_POST['alamat'])); ?></li>
          <li>Prodi: <?php echo htmlspecialchars($_POST['prodi']); ?></li>
          <li>Gender: <?php echo htmlspecialchars($_POST['gender']); ?></li>
        </ul>
      <?php endif; ?>
    <?php else: ?>
      <?php include 'form.inc'; ?>
    <?php endif; ?>
  </fieldset>
</body>
</html>
