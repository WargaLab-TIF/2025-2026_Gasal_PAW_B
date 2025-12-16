<?php
require_once 'includes/hubung.php';

$hasil = mysqli_query($conn, "SELECT * FROM supplier");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link rel="stylesheet" href="aset/style.css">
</head>
<body>
    
    <?php include 'aset/header.php' ?>

    <div class="utama">
    <div class="judul">
        <h2>Data Master Supplier</h2>
    </div>

    <div class="tambah">
        <button class="btn btn-tambah" onclick="window.location.href='tambahsupplier.php'">Tambah Data</button>
    </div>

    <?php
    session_start();
    
    if (isset($_SESSION['sukses'])) {
        echo "<div class='sukses'>{$_SESSION['sukses']}</div>";

    unset($_SESSION['sukses']);
    }
    if (isset($_SESSION['error'])) {
        echo "<div class='error'>{$_SESSION['error']}</div>";
        unset($_SESSION['error']);
    }
    ?>

    <div class="tabel">
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Tindakan</th>
            </tr>
            <?php while($row=mysqli_fetch_assoc($hasil)): ?>
            <tr>
                <td><?= htmlspecialchars(trim($row['id'])) ?></td>
                <td><?= htmlspecialchars(trim($row['nama'])) ?></td>
                <td><?= htmlspecialchars(trim($row['telp'])) ?></td>
                <td><?= htmlspecialchars(trim($row['alamat'])) ?></td>
                <td>
                    <div class="tombol">
                        <button class="btn btn-edit" onclick="window.location.href='editsupplier.php?id=<?= $row['id'] ?>'">Edit</button>
                        <button class="btn btn-hapus" onclick="return confirmHapus(<?= $row['id'] ?>)">Hapus</button>
                    </div>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    </div>

    <script>
    function confirmHapus(id) {
        if (confirm('Anda yakin ingin menghapus supplier ini?')) {
            window.location.href = 'hapus_supplier.php?id=' + id;
        }
    return false;
    }
    </script>


</body>
</html>