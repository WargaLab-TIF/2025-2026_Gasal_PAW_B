<?php
    $nama   = "Okan Syailendra Wahyudi";
    $nim    = "240411100179";
    $kelas  = "PAW IF-3B";
    $prodi  = "Teknik Informatika";
    $alamat = "jl cendana 1 blok f no 1";
    $hobi   = "Main game, baca novel";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Biodata</title>
</head>
    <body>
        <h2>Biodata</h2>
        <table border = 1>
            <tr>
                <th bgcolor = "grey">Field</th>
                <th bgcolor = "grey">Value</th>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><?= $nama ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><?= $nim ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><?= $kelas ?></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td><?= $prodi ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?= $alamat ?></td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td><?= $hobi ?></td>
            </tr>
        </table>
    </body>
</html>
