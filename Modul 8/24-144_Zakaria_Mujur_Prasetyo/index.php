<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Unknown';
$level = isset($_SESSION['level']) ? $_SESSION['level'] : 0;
$nama = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="wadah jarak">
        <div class="kartu bayangan isi">
            <h2 class="judul-biru">Selamat Datang, <?= $nama; ?>!</h2>
            <p>Anda login sebagai <b><?= $role; ?></b>.</p>
            <p>Silakan pilih menu di atas untuk mengelola data.</p>
        </div>
    </div>

</body>
</html>