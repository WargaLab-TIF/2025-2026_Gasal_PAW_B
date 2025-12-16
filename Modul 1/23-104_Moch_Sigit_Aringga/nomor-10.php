<?php
// Clue: Simpanlah data biodata di variabel PHP
$nama_lengkap = "Moch Sigit Aringga";
$nim = "230411100104";
$kelas = "PAW - B       ";
$program_studi = "Teknik Informatika";
$alamat = "Telang Kec. Kamal Kab. Bangkalan";
$hobi = "Membaca buku";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Diri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        table {
            width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #5062dcff;
            color: white;
            font-size: 18px;
        }

        td:first-child {
            font-weight: bold;
            width: 30%;
        }
    </style>
</head>

<body>

    <table border="1">
        <thead>
            <tr>
                <th colspan="2">BIODATA MAHASISWA</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nama Lengkap</td>
                <td><?php echo $nama_lengkap; ?></td>
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
                <td><?php echo $program_studi; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?php echo $alamat; ?></td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td><?php echo $hobi; ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>