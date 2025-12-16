<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM supplier ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Master Supplier</title>
    <style>
        table { border-collapse: collapse; width: 70%; margin: 20px auto; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a.button {
            background: green; color: white; padding: 6px 10px; text-decoration: none;
            border-radius: 5px; margin-right: 5px;
        }
        a.edit { background: orange; }
        a.hapus { background: red; }
    </style>
</head>
<body>
    <h2 align="center">Data Master Supplier</h2>
    <div style="text-align:center; margin-bottom:10px;">
        <a href="tambah.php" class="button">Tambah Data</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
        $no = 1;
        if (mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>$no</td>
                        <td>" . htmlspecialchars($data['nama']) . "</td>
                        <td>" . htmlspecialchars($data['telp']) . "</td>
                        <td>" . htmlspecialchars($data['alamat']) . "</td>
                        <td>
                            <a href='edit.php?id={$data['id']}' class='button edit'>Edit</a>
                            <a href='hapus.php?id={$data['id']}' class='button hapus' onclick='return confirm(\"Yakin hapus data ini?\")'>Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='5' align='center'>Belum ada data supplier.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
