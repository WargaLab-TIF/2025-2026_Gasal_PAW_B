<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Pabrik";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT id, nama, telp, alamat FROM supplier";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Master Supplier</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 10px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        h2 {
            margin: 0;
            font-size: 1.5em;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid #000;
            color: #000;
            cursor: pointer;
            background-color: #eee;
            margin-left: 5px;
        }
        .btn:hover {
            background-color: #ccc;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #000;
        }
        th {
            background-color: #ddd;
        }
        .text-center {
            text-align: center;
        }
        .btn-action {
            padding: 5px 8px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Data Master Supplier</h2>
        <a href="tambah_data.php" class="btn">Tambah Data</a>
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
                $no = 1;
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["telp"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["alamat"]) . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row["id"] . "' class='btn btn-action'>Edit</a>";
                        echo "<a href='hapus.php?id=" . $row["id"] . "' class='btn btn-action' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data supplier.</td></tr>";
                }
                ?>
            </tbody>
    </table>
</div>

<?php
$conn->close();
?>

</body>
</html>