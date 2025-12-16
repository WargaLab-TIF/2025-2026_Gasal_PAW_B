<?php
    $myname='Anas';
    $no=240411100200;
    $class="PAW 3B";
    $prodi='Teknik Informatika';
    $domisili='Madura';
    $pass='football';
?>

<html>
    <head>
        <title>test</title>
    </head>
    <body>
        <table border="2">
            <tr style="background-color: aquamarine;">
                <th>Nama</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Program Studi</th>
                <th>Alamat</th>
                <th>Hobi</th>
            </tr>
            <tr>
                <td><?= $myname?></td>
                <td><?= $no?></td>
                <td><?= $class?></td>
                <td><?= $prodi?></td>
                <td><?= $domisili?></td>
                <td><?= $pass?></td>
            </tr>
        </table>
    </body>
</html>