<?php
$nama = "Deo Candra Saputra";
$nim = "240411100137";
$kelas = "PAW IF 3B";
$prodi = "Teknik Informatika";
$alamat = "desa kedunggudel kec. widodaren kab. ngawi prov. jawa timur";
$hobi = "main game, mancing";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nomor 10</title>
</head>
<body>
    <h2>Tabel Biodata Diri</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Prodi</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <tr>
            <td><?php echo $nama; ?></td>
            <td><?php echo $nim; ?></td>
            <td><?php echo $kelas; ?></td>
            <td><?php echo $prodi; ?></td>
            <td><?php echo $alamat; ?></td>
            <td><?php echo $hobi; ?></td>
        </tr>

    </table>
</body>
</html>