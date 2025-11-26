<?php
include "koneksi.php";
$result = $conn->query("SELECT * FROM barang");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Data Barang</h2>
<a href="tambah.php" class="btn">+ Tambah Barang</a>
<table>
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>{$no}</td>
            <td>{$row['kode_barang']}</td>
            <td>{$row['nama_barang']}</td>
            <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
            <td>{$row['stok']}</td>
            <td>
                <a href='edit.php?id={$row['id']}' class='edit'>Edit</a>
                <a href='hapus.php?id={$row['id']}' class='hapus' onclick=\"return confirm('Yakin ingin hapus data ini?')\">Hapus</a>
            </td>
        </tr>";
        $no++;
    }
    ?>
</table>
</body>
</html>