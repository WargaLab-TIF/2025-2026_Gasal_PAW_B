<?php
// FILE: Tugas-1.php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn {
            display: inline-block; padding: 8px 12px; margin: 2px;
            border-radius: 4px; text-decoration: none; color: white; font-size: 14px;
        }
        .btn-tambah { background-color: #28a745; }
        .btn-edit { background-color: #ffc107; }
        .btn-hapus { background-color: #dc3545; }
    </style>
</head>
<body>
    <h2>Data Master Supplier</h2>
        <a href="Tugas-2.php" class="btn btn-tambah">Tambah Data</a><hr>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id, nama, telp, alamat FROM penjualan_supplier";
            $result = $conn->query($sql);
            $no = 1; 
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["telp"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["alamat"]) . "</td>";
                    echo "<td>";
                    // Link ke Tugas-3.php
                    echo "<a href='Tugas-3.php?id=" . $row["id"] . "' class='btn btn-edit'>Edit</a>";
                    // Link ke Tugas-4.php
                    echo "<a href='Tugas-4.php?id=" . $row["id"] . "' class='btn btn-hapus' 
                           onclick=\"return confirm('Anda yakin akan menghapus supplier ini?');\">Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>