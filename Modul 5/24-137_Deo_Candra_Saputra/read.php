<?php
require_once "koneksi.php";

$sql = "SELECT * FROM supplier";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
    <title>Data Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Master Supplier</h2>
    <a href="insert.php" class="btn-tambah">Tambah Data</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
        $no = 1;
        if($result && mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['telp']."</td>";
                echo "<td>".$row['alamat']."</td>";
                echo "<td>
                        <a class='btn-edit' href='update.php?id=".$row['id']."'>Edit</a>
                        <a class='btn-hapus' href='delete.php?id={$row['id']}'onclick=\"return confirm('Anda yakin akan menghapus supplier ini?')\">Hapus</a>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td>Data tidak ditemukan</td></tr>";
        }
        ?>
    </table>
</body>
</html>
