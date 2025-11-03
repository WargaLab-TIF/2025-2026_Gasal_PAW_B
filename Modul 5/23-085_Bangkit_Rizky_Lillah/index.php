<?php 

include 'koneksi.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script>
        function hapusData(id) {
            if (confirm("Anda yakin akan menghapus supplier ini?")) {
                window.location.href = "hapus.php?id=" + id;
            }
        }
    </script>
</head>
<body class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="m-0">Data Master Supplier</h3>
        <a href="tambah.php" class="btn btn-success">Tambah Data</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
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
        $no = 1;
        $result = mysqli_query($koneksi, "SELECT * FROM supplier ORDER BY id ASC");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <tr>
                <td>{$no}</td>
                <td>{$row['nama']}</td>
                <td>{$row['telp']}</td>
                <td>{$row['alamat']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                    <button onclick='hapusData({$row['id']})' class='btn btn-danger btn-sm'>Hapus</button>
                </td>
            </tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>
</body>
</html>
