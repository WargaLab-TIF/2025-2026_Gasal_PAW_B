<?php 
    $namaLengkap = "Surya Maulana Akhmad";
    $nim = 240411100160;
    $kelas = "Pengembangan Aplikasi Web 3B";
    $programStudi = "Teknik Informatika";
    $alamat = "Lumajang";
    $hobi = "Baca Berita Politik";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Mahasiswa</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="5">
        <tr style="background-color: yellow;">
            <th>Nama Lengkap</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Program Studi</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <tr>
            <td><?= "$namaLengkap"; ?></td>
            <td><?= "$nim"; ?></td>
            <td><?= "$kelas"; ?></td>
            <td><?= "$programStudi"; ?></td>
            <td><?= "$alamat"; ?></td>
            <td><?= "$hobi"; ?></td>
        </tr>
    </table>
</body>
</html>