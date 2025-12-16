<?php
require_once 'koneksi.php';

$sql = "SELECT * FROM supplier";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h3>Data Master Supplier</h3>";
    echo "<button><a href='add.php'>Tambah</a></button>";

    echo "
    <table border='1'>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th colspan='2'>Tindakan</th>
        </tr>";

    $no = 1;
    while($row = mysqli_fetch_assoc($result)){
        echo "
        <tr>
            <td>$no</td>
            <td>".$row['nama']."</td>
            <td>".$row['telp']."</td>
            <td>".$row['alamat']."</td>
            <td><form action='edit.php' method='post'><button type='submit' name='edit' value='".$row['id']."'>EDIT</button></form></td>
            <td>
                <form action='delete.php' method='post' onsubmit=\"return confirm('Yakin ingin menghapus data ini?');\">
                    <input type='hidden' name='hapus' value='".$row['id']."'>
                    <input type='submit' value='Hapus'>
                </form>
            </td>
        </tr>
        ";
        $no ++;
    }

    echo "</table>";
} else {
    echo "Tidak ada data";  
}
?>