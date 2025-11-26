<?php
require "koneksi.php";
$barang = mysqli_query($conn, "SELECT b.* , s.nama_pelanggan FROM barang b JOIN nota s ON b.no_nota = s.no_nota");
if (!$barang) {
    die("query gagal" . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Barang Pembelian</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a href="tabel_barang.php" class="active">Lihat Tabel Barang</a>
        <a href="tabel_nota.php">Lihat Tabel Nota</a>
        <a href="form_nota.php">Beli Barang</a>
    </nav>

    <div class="container">
        <h1>Tabel Barang Pembelian</h1>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Pelanggan</th>
                    <th>Nama barang</th>
                    <th>Jumlah</th>
                    <th>harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($barang)) {
                    while ($row = mysqli_fetch_assoc($barang)) {
                        echo "<tr>";
                        echo "<td>" . $row['id_barang'] . "</td>";
                        echo "<td>" . $row['nama_pelanggan'] . "</td>";
                        echo "<td>" . $row['nama_barang'] . "</td>";
                        echo "<td>" . $row['jumlah'] . "</td>";
                        echo "<td>" . $row['harga'] . "</td>";
                        echo "<td>" . $row['sub_total'] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>