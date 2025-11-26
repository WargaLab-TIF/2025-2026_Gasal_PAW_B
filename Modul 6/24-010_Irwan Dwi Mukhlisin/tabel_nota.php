<?php
require "koneksi.php";
$nota = mysqli_query($conn, "SELECT * FROM nota");
if (!$nota) {
    die("query gagal" . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Nota Pembelian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="tabel_barang.php">Lihat Tabel Barang</a>
        <a href="tabel_nota.php" class="active">Lihat Tabel Nota</a>
        <a href="form_nota.php">Beli Barang</a>
    </nav>

    <div class="container">
        <h1>Tabel Nota Pembelian</h1>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($nota) > 0) {
                    while ($row = mysqli_fetch_assoc($nota)) {
                        $no_nota = $row['no_nota'];
                        echo "<tr>";
                        echo "<td>" . $row['no_nota'] . "</td>";
                        echo "<td>" . $row['nama_pelanggan'] . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "<td>" . $row['total'] . "</td>";
                        echo "<td><button onclick=\"location.href='hapus_nota.php?no_nota=" . $row['no_nota'] . "'\">Hapus</button></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>