<?php
$nmlngkp = "Mohammad Andri Firmansyah";
$NIM = 240411100139;
$kls = "PAW B";
$prgmstd = "Teknik Informatika";
$almt = "Negara Indonesia Provinsi Jawa Timur Kabupaten Mojokerto";
$hb = "Bermain game";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>
<body>
    <h1>Selamat Datang di Biodata</h1>
    <table border="1" >
        <tr style="background:yellow;">
            <td>Biodata</td>
            <td>Keterangan</td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td><?= $nmlngkp?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><?= $NIM?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td><?= $kls?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td><?= $prgmstd?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?= $almt?></td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td><?= $hb?></td>
        </tr>
    </table>
</body>
</html>