<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h1>Dashboard Utama</h1>
        <hr>
        <p>Selamat Datang, <b><?php echo $_SESSION['nama']; ?></b>.</p>
        <p>Anda Login sebagai: <b><?php echo ($_SESSION['level'] == 1) ? "Administrator" : "User Biasa"; ?></b>.</p>
    </div>
</body>

</html>