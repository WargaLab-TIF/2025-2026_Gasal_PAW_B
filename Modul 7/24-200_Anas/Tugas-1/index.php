<?php 

require 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Data Penjualan Harian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="aa">
        <form action="display.php" method="post">
            <input type="date" name="tanggalawal" id="tanggalawal" class="a" min="2023-09-01" max="2023-09-27" required>
            <input type="date" name="tanggalakhir" id="tanggalakhir" class="a" min="2023-09-01" max="2023-09-27" required>
            <button type="submit" name="submit" class="b">Tampilkan</button>
        </form>
    </div>
</body>
</html>