<?php
// 10_biodata_table.php — Menampilkan biodata dalam tabel HTML (CSS dasar)

// Simpan data biodata di variabel PHP
$nama   = "Rizki Pratama Sunarko";
$nim    = "240411100181";
$kelas  = "3B";
$prodi  = "S1 Teknik Informatika";
$alamat = "Nganjuk, Jawa Timur";
$hobi   = "Memancing";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Biodata Mahasiswa</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 6px;
        }
        th {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Biodata Mahasiswa</h2>
    <table>
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
