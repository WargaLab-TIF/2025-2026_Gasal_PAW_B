<?php
require_once 'koneksi.php';


$SQL = "SELECT * FROM supplier";
$result = mysqli_query($conn, $SQL);
$one =  mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="colors_agak_mirip.css">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h1 style="color: var(--primary-text);">Data Master Supplier</h1>
        <a href="tambah.php" class="btn btn-green">Tambah Data</a>
    </div>

    <table  cellpadding="5">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
            $no = 0;
            foreach ($one as $key => $value) {
            $no ++;
        ?>
            <tr>
                <td><?=$no;?></td>
                <td><?=$value['nama'];?></td>
                <td><?=$value['telp'];?></td>
                <td><?=$value['alamat'];?></td>
                <td>
                    <a href="edit.php?id=<?=$value['id']; ?>"  class="btn btn-orange">Edit</a>
                    <a href="delete.php?id=<?=$value['id']; ?>" onclick="return confirm('Apa anda yakin menghapus supplier ini?')" class="btn btn-red">Hapus</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>