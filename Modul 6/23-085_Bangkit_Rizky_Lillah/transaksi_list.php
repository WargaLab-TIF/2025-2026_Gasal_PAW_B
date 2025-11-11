<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Transaksi</title>
    <style>
        body {font-family: Arial, sans-serif;background: #f7f7f7;margin: 0;padding: 0;}
        nav {background-color: #007bff;padding: 10px;text-align: center;}
        nav a {color: white;text-decoration: none;font-weight: bold;margin: 0 15px;padding: 6px 12px;}
        nav a:hover {background-color: #0056b3;border-radius: 5px;}
        .container {background: white;margin: 30px auto;width: 90%;max-width: 1000px;border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.1);padding: 20px 40px;}
        h2 {text-align: center;color: #333;}
        table {width: 100%;border-collapse: collapse;margin-top: 15px;}
        th, td {padding: 10px;text-align: center;border: 1px solid #ddd;}
        th {background-color: #007bff;color: white;}
        tr:nth-child(even){background-color: #f2f2f2;}
        tr:hover {background-color: #e6f2ff;}
        .btn {border: none;border-radius: 5px;padding: 5px 10px;cursor: pointer;color: white;text-decoration: none;}
        .btn-view {background-color: #28a745;}
        .btn-view:hover {background-color: #218838;}
        .btn-delete {background-color: #dc3545;}
        .btn-delete:hover {background-color: #c82333;}
        .no-data {text-align: center;padding: 15px;background-color: #fff3cd;border-radius: 5px;}
    </style>
</head>
<body>
<nav>
    <a href="transaksi_form.php">Input Transaksi</a>
    <a href="transaksi_list.php">Lihat Transaksi</a>
</nav>

<div class="container">
    <h2>Daftar Transaksi</h2>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM nota ORDER BY id DESC");
    if (mysqli_num_rows($result) == 0) {
        echo "<p class='no-data'>Belum ada transaksi yang tersimpan.</p>";
    } else {
        echo "<table>";
        echo "<tr>
                <th>No</th>
                <th>Nomor Nota</th>
                <th>Nama Pembeli</th>
                <th>Tanggal</th>
                <th>Total (Rp)</th>
              </tr>";
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nomor']}</td>
                    <td>{$row['nama_pembeli']}</td>
                    <td>{$row['tanggal']}</td>
                    <td style='text-align:right;'>" . number_format($row['total'], 0, ',', '.') . "</td>
                  </tr>";
            $no++;
        }
        echo "</table>";
    }
    ?>
</div>
</body>
</html>
