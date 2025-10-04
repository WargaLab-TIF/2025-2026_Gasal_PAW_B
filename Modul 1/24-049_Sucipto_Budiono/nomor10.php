<?php
$nama   = "Budi Santoso";
$nim    = "123456789";
$kelas  = "PAW-A";
$prodi  = "Informatika";
$alamat = "Jl. Merdeka No. 10";
$hobi   = "Membaca Buku";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Biodata</title>
</head>
<body>
    <h2>Biodata</h2>
    <table border="1" cellpadding="5" cellspacing="0">
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
