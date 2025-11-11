<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Transaksi</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        .action a { margin-right: 5px; text-decoration: none; }
    </style>
</head>
<body>

    <h1>Daftar Transaksi </h1>
    <a href="form_tambah.php">Tambah Transaksi Baru</a>
    <br><br>

    <table border="1">
        <tr>
            <th>No.</th>
            <th>No. Nota</th>
            <th>Tanggal</th>
            <th>Nama Pelanggan</th>
            <th>Total Keseluruhan</th>
            <th>Aksi</th>
        </tr>
        <?php
        require 'koneksi.php';
        $sql = "SELECT * FROM nota ORDER BY tanggal DESC";
        $result = mysqli_query($conn, $sql);
        
        $no = 1;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $row['no_nota'] . "</td>";
                echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td>" . $row['nama_pelanggan'] . "</td>";
                echo "<td>Rp " . number_format($row['total_keseluruhan'], 0, ',', '.') . "</td>";
                echo "<td class='action'>";
                
                echo "<a href='detail.php?id=" . $row['id_nota'] . "'>Detail</a> | ";
                echo "<a href='edit.php?id=" . $row['id_nota'] . "'>Edit</a> | "; 
                echo "<a href='delete.php?id=" . $row['id_nota'] . "' 
                         onclick=\"return confirm('Anda yakin ingin menghapus nota ini? Semua detail barang akan ikut terhapus.');\">Hapus</a>";
                
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data transaksi.</td></tr>";
        }
        ?>
    </table>

</body>
</html>