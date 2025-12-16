<?php
// Simpan data biodata di variabel PHP
$nama_lengkap = "Roky Zofyan Amirullah";
$nim = "230411100205";
$kelas = "PAW-B";
$program_studi = "Teknik Informatika";
$alamat = "Pemekasan, Waru, Tagangser Laok";
$hobi = "Ngegame, Coding, Berenang";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Biodata Diri</title>
    <style>
        body { font-family: sans-serif; }
        table { border-collapse: collapse; width: 50%; margin: 20px 0; }
        th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Biodata Diri</h2>

    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
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
    </table>

</body>
</html>