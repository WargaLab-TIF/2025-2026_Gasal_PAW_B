<?php 
include "cek_login.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<h2>Selamat Datang, <?php echo $_SESSION['nama']; ?> </h2>

<?php if($_SESSION['level'] == 1){ ?>

    <h3>Menu Level 1</h3>
    <ul>
        <li>Home</li>
        <li>Data Master</li>
        <li>Transaksi</li>
        <li>Laporan</li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

<?php }
 else if($_SESSION['level'] == 2){ ?>

    <h3>Menu Level 2</h3>
    <ul>
        <li>Home</li>
        <li>Transaksi</li>
        <li>Laporan</li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

<?php } ?>

</body>
</html>