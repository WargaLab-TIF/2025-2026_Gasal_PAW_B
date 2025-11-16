<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Transaksi</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <a href="index.php">Kembali ke Daftar Nota</a>
    <h1>Detail Transaksi</h1>

    <?php
    require 'koneksi.php';
    if (!isset($_GET['id'])) {
        die("Error: ID Nota tidak ditemukan.");
    }
    $id_nota = $_GET['id'];

    $sql_master = "SELECT * FROM nota WHERE id_nota = ?";
    $stmt_master = mysqli_prepare($conn, $sql_master);
    mysqli_stmt_bind_param($stmt_master, "i", $id_nota);
    mysqli_stmt_execute($stmt_master);
    $result_master = mysqli_stmt_get_result($stmt_master);
    
    if (mysqli_num_rows($result_master) == 0) {
        die("Data nota tidak ditemukan.");
    }
    $nota = mysqli_fetch_assoc($result_master);
    ?>

    <p><strong>No. Nota:</strong> <?php echo $nota['no_nota']; ?></p>
    <p><strong>Tanggal:</strong> <?php echo $nota['tanggal']; ?></p>
    <p><strong>Nama Pelanggan:</strong> <?php echo $nota['nama_pelanggan']; ?></p>
    
    <hr>
    <h3>Daftar Barang </h3>
    
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Subtotal</th>
        </tr>
        <?php
        $sql_detail = "SELECT * FROM detail_barang WHERE id_nota = ?";
        $stmt_detail = mysqli_prepare($conn, $sql_detail);
        mysqli_stmt_bind_param($stmt_detail, "i", $id_nota);
        mysqli_stmt_execute($stmt_detail);
        $result_detail = mysqli_stmt_get_result($stmt_detail);

        $no = 1;
        if (mysqli_num_rows($result_detail) > 0) {
            while ($row = mysqli_fetch_assoc($result_detail)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['nama_barang'] . "</td>";
                echo "<td>" . $row['jumlah'] . "</td>";
                echo "<td>Rp " . number_format($row['harga_satuan'], 0, ',', '.') . "</td>";
                echo "<td>Rp " . number_format($row['subtotal'], 0, ',', '.') . "</td>";
                echo "</tr>";
            }
        }
        ?>
        <tr style="font-weight: bold;">
            <td colspan="4" style="text-align: right;">Total Keseluruhan</td>
            <td>Rp <?php echo number_format($nota['total_keseluruhan'], 0, ',', '.'); ?></td>
        </tr>
    </table>

</body>
</html>