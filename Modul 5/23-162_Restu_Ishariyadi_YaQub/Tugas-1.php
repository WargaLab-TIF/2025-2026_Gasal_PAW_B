<?php
require_once "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Supplier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        
        <div class="header-container">
            <h2>Data Master Supplier</h2>
            <a href="Tugas-2.php" class="btn btn-tambah">Tambah Data</a>
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
                $sql = "SELECT * FROM supplier";
                $result = mysqli_query($conn, $sql);
                
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['telp']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                        echo "<td>";

                        echo "<a href='Tugas-3.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a> ";
                        

                        echo "<a href='Tugas-4.php?id=" . $row['id'] . "' class='btn btn-hapus' onclick='return confirm(\"Anda yakin akan menghapus supplier ini?\");'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } 
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>

<?php


mysqli_close($conn);
?>