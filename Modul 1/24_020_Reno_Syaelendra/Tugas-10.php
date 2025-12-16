<?php
// Deklarasi variabel biodata
$nama = "Reno Syaelendra";
$nim = "2411100020";
$kelas = "PAW IF3B";
$prodi = "Teknik Informatika";
$alamat = "Jl. Benowo Raya No.123, Surabaya";
$hobi = "Push MLBB sampe Mythic Immortal";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 10 PHP</title>
</head>
<body>
     <h2>Biodata Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td><?php echo $nim; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td><?php echo $kelas; ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td><?php echo $prodi; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td><?php echo $hobi; ?></td>
        </tr>
    </table>
</body>
</html>
