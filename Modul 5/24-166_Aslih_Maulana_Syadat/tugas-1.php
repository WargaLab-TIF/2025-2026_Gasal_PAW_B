<!DOCTYPE html>
<html>
<head>
    <title>Data Master Supplier</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px; 
        }
        h2 { 
            color: lightblue; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 15px; 
        }
        th, td { 
            border: 1px solid black; 
            padding: 8px; 
            text-align: left; 
        }
        th { 
            background-color: lightblue; 
        }
        a { 
            text-decoration: none; 
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            text-align: center;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            color: white;
            margin-right: 5px;
        }
        .btn-tambah {
            background-color: green;
            border-color: green;
            margin-bottom: 15px;
        }
        .btn-edit {
            background-color: orange;
            border-color: orange;
        }
        .btn-hapus {
            background-color: red;
            border-color: red;
        }
    </style>
</head>
<body>

    <h2>Data Master Supplier</h2>
    <a href="tugas-2.php" class="btn btn-tambah">Tambah Data</a>
    <br><br>

    <table border="1">
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
            require_once 'koneksi.php';
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM supplier");

            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['telp']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td>
                        <a href="tugas-3.php?id=<?php echo $data['id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="tugas-4.php?id=<?php echo $data['id']; ?>" class="btn btn-hapus" 
                           onclick="return confirm('Anda yakin akan menghapus supplier ini?');">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>