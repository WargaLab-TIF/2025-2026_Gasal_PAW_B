<?php
$nama_lengkap = "Muhammad Fajar Nugroho";
$nim = 240411100103;
$kelas = "IF 3B";
$program_studi = "Teknik Informatika";
$alamat = "Jl. Raya Tlogomas No. 246, Bojonegoro";
$hobi = "Membaca buku, bermain game, dan coding";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
</head>
<body>
    <h1>Biodata</h1>
    <table border="0" cellpadding="10" cellspacing="0">
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td><?php echo $nama_lengkap; ?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><?php echo $nim; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?php echo $kelas; ?></td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>:</td>
            <td><?php echo $program_studi; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $alamat; ?></td>
        </tr>
        <tr>
            <td>Hobi</td>
            <td>:</td>
            <td><?php echo $hobi; ?></td>
        </tr>
    </table>
</body>
</html>