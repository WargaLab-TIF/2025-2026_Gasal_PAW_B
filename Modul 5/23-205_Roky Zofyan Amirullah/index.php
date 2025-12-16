<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Master Supplier</title>
    <style>
        body { font-family: sans-serif; }
        table { border-collapse: collapse; width: 80%; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; padding: 5px 10px; border-radius: 4px; }
        .btn-tambah { background-color: #28a745; color: white; margin-bottom: 10px; display: inline-block; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-hapus { background-color: #dc3545; color: white; }
        
        /* Style untuk notifikasi sukses */
        .status-sukses { 
            color: #155724; 
            background-color: #d4edda; 
            border: 1px solid #c3e6cb; 
            padding: 10px; 
            border-radius: 4px; 
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h2>Data Master Supplier</h2>

    <?php
    if(isset($_GET['status'])) {
        $status = $_GET['status'];
        echo '<div class="status-sukses">';
        if($status == 'tambah_sukses') {
            echo "Data supplier baru berhasil ditambahkan!";
        } elseif($status == 'edit_sukses') {
            echo "Data supplier berhasil diupdate!";
        } elseif($status == 'hapus_sukses') {
            echo "Data supplier berhasil dihapus!";
        }
        echo '</div>';
    }
    ?>

    <a href="tambah.php" class="btn-tambah">Tambah Data</a>

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
            $sql = "SELECT * FROM supplier ORDER BY id DESC"; 
            $result = mysqli_query($conn, $sql);
            
            $no = 1; 
            
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['telp']); ?></td>
                    <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                        
                        <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn-hapus" 
                           onclick="return confirm('Anda yakin akan menghapus supplier ini?');">Hapus</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
            }
        
            mysqli_close($conn);
            ?>
        </tbody>
    </table>

</body>
</html>