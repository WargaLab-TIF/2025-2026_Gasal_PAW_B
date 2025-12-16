<!DOCTYPE html>
<html>
<head>
    <title>Biodata</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
<?php
// Mendefinisikan variabel biodata
$nama = "Sabrina Nur Haliza";
$nim = "240411100204";
$kelas = "IF-3B";
$prodi = "Teknik Informatika";
$alamat = "Bangkalan";
$hobi = "Desain";
?>

<h2 style="text-align:center;">Biodata Mahasiswa</h2>
<table>
    <tr>
        <th>Field</th>
        <th>Value</th>
    </tr>
    <tr><td>Nama Lengkap</td><td><?php echo $nama; ?></td></tr>
    <tr><td>NIM</td><td><?php echo $nim; ?></td></tr>
    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
    <tr><td>Program Studi</td><td><?php echo $prodi; ?></td></tr>
    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
    <tr><td>Hobi</td><td><?php echo $hobi; ?></td></tr>
</table>
</body>
</html>
