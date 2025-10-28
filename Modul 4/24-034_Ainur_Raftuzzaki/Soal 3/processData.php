<?php
session_start();

if (!isset($_SESSION['formData'])) {
    header("Location: formValidation.php");
    exit;
}

$data = $_SESSION['formData'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa Berhasil Divalidasi</h2>
    <p><strong>Nama:</strong> <?= htmlspecialchars($data['Nama']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($data['email']) ?></p>
    <p><strong>Tanggal Lahir:</strong> <?= htmlspecialchars($data['tanggal']) ?></p>

    <br>
    <a href="formValidation.php">Kembali ke Form</a>
</body>
</html>