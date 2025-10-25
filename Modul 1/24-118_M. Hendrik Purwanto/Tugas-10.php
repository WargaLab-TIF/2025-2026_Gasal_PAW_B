<?php
$nama   = "Hendrik Purwanto";
$nim    = "210411100123";
$kelas  = "IF-3B";
$prodi  = "Teknik Informatika";
$alamat = "Jl. Raya Bundah, Madura";
$hobi   = "Astronomi";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Documents</title>
</head>
<body>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th colspan="2">Biodata Mahasiswa</th>
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
