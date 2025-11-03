<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
</head>
<body>
    <h2>Data Master Supplier</h2>
    <a href="tambah.php">Tambah Data</a><br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr bgcolor="#add8e6">
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>

        <?php
        $no = 1;
        $result = mysqli_query($koneksi, "SELECT * FROM supplier");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['nama']); ?></td>
            <td><?= htmlspecialchars($row['telp']); ?></td>
            <td><?= htmlspecialchars($row['alamat']); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> | 
                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus data ini?');">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>