<?php
$nama = "Ainur Raftuzzaki";
$nim = "240411100034";
$kelas = "PAW B";
$prodi = "Teknik Informatika";
$alamat = "Kalimantan Utara";
$hobi = "Bermain game, membaca & Olahraga";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Biodata</title>  
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <h2>Biodata</h2>
    <table>
        <tr>
            <th>Data Diri</th>
            <th>Keterangan</th>
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