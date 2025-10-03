<?php
$nama = "Aslih Maulana Syadat";
$NIM = "240411100166";
$kelas = "PAW B";
$prodi = "Teknik Informatika";
$alamat = "Lamongan";
$hobi = "Bermain Game";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>
<body>
    <h1>Biodata Diri</h1>
    <table border="0">
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?= $nama ?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><?= $NIM ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $kelas ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td><?= $prodi ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $alamat ?></td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td>:</td>
            <td><?= $hobi ?></td>
        </tr>
    </table>
</body>
</html>