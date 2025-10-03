<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
        $nama= "Yohanes Oktanio";
        $nim = 240411100095;
        $kelas = "PAW - B";
        $programStudi = "Teknik Informatika";
        $alamat = "Ngepung, Kabuh Jombang";
        $hobi = "Distro Hopper";
    ?>
   <table border="1">
     <tr >
        <th>Nama</th>
        <th>Nim</th>
        <th>Kelas</th>
        <th>Program Studi</th>
        <th>Alamat</th>
        <th>Hobi</th>
    </tr>
    <tr>
        <td><?=$nama ?></td>
        <td><?=$nim ?></td>
        <td><?=$kelas ?></td>
        <td><?=$programStudi ?></td>
        <td><?=$alamat ?></td>
        <td><?=$hobi ?></td>


    </tr>
   </table>
</body>
</html>