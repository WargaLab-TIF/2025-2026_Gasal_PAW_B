<?php
$nama = 'Irwan Dwi Mukhlisin';
$nim = 240411100010;
$kelas = 'PAW 3B';
$prodi = 'Teknik Informatika';
$alamat = 'Lamongan';
$hobi = 'Sepak bola';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Tabel Biodata Diri</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Nama Lengkap</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Program Studi</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <tr>
            <td><?= $nama ?></td>
            <td><?= $nim ?></td>
            <td><?= $kelas ?></td>
            <td><?= $prodi ?></td>
            <td><?= $alamat ?></td>
            <td><?= $hobi ?></td>
        </tr>
    </table>
</body>

</html>