<?php
include 'koneksi.php';

$query = "SELECT * FROM supplier";
$result = mysqli_query($cont, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Master Supplier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .btn-tambah {
            background: #4CAF50;
            color: white;
            padding: 8px 14px;
            border-radius: 5px;
            float: right;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
                 
        }
        .container {
            width: 80%;
            margin: 40px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .btn-edit {
            background-color: orange;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-hapus {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
     <script>
        function confirmDelete(id) {
            var konfirmasi = confirm("Anda yakin akan menghapus supplier ini?");
            if (konfirmasi) {
                window.location = "Tugas-1.php?hapus=" + id;
            }
        }
    </script>
</head>
<body>

<div class="container">
    <h2>Data Master Supplier</h2>
    <a href="Tugas-2.php" class="btn-tambah">Tambah Data</a>
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
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$no++."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['telp']."</td>";
                echo "<td>".$row['alamat']."</td>";
                echo "<td>
                        <a href='Tugas-3.php?id=".$row['id']."' class='btn-edit'>Edit</a>
                        <a href='Tugas-4.php?id=".$row['id']."' class='btn-hapus' onclick='return confirm(\"Yakin ingin hapus data?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
