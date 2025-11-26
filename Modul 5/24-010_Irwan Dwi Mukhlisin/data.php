<?php
require_once "koneksi.php";

$query = "SELECT * FROM supplier";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #5daad3ff;
        }

        .btn-edit,
        .btn-delete {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            color: white;
        }

        .btn-edit {
            margin-left: 2px;
            background-color: orange;
        }

        .btn-delete {
            margin-right: 2px;
            background-color: red;
        }

        .btn-add {
            margin-left: 630px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #1b8429ff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body>
    <a href="tambah_data.php" class="btn-add">Tambah Data</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <?php
            $no = 1;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['telp']}</td>
                        <td>{$row['alamat']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}' class='btn-edit'>Edit</a>
                            <a href='delete.php?id={$row['id']}' class='btn-delete' onclick='return confirm(\"Yakin menghapus data ini?\")'>Hapus</a>
                        </td>
                      </tr>";
                    $no++;
                }
            }
            ?>
        </tr>
    </table>
</body>

</html>