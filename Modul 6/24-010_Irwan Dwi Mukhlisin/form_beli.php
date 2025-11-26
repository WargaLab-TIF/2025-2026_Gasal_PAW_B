<?php
require 'koneksi.php';

if (!isset($_GET['no_nota'])) {
    die("Nota belum dipilih!");
}

$no_nota = $_GET['no_nota'];

$name = mysqli_query($conn, "SELECT nama_pelanggan FROM nota WHERE no_nota = '$no_nota'");
$name = mysqli_fetch_assoc($name);
$nama_pelanggan = $name['nama_pelanggan'];

$jumlah_baris = isset($_POST['jumlah_baris']) ? $_POST['jumlah_baris'] : 1;
if (isset($_POST['tambah_baris'])) {
    $jumlah_baris++;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan_barang'])) {
    for ($i = 0; $i < count($_POST['nama_barang']); $i++) {
        $nama_barang = $_POST['nama_barang'][$i];
        $jumlah = $_POST['jumlah'][$i];
        $harga = $_POST['harga'][$i];

        if ($nama_barang != "" && $jumlah != "" && $harga != "") {
            $sub_total = $jumlah * $harga;

            $query = "INSERT INTO barang (no_nota, nama_barang, jumlah, harga, sub_total) 
                      VALUES ('$no_nota', '$nama_barang', '$jumlah', '$harga', '$sub_total')";
            mysqli_query($conn, $query);
        }
    }
    $update_total = "
        UPDATE nota 
        SET total = (
            SELECT SUM(sub_total) FROM barang WHERE no_nota = '$no_nota'
        ) 
        WHERE no_nota = '$no_nota'
    ";
    mysqli_query($conn, $update_total);

    header("Location: form_beli.php?no_nota=$no_nota");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Barang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a href="tabel_barang.php">Lihat Tabel Barang</a>
        <a href="tabel_nota.php">Lihat Tabel Nota</a>
        <a href="form_nota.php">Beli Barang</a>
    </nav>
    <div class="container">
        <h2>Beli Barang</h2>
        <p>Nama Pelanggan: <strong><?= htmlspecialchars($nama_pelanggan) ?></strong></p>

        <form method="post">
            <input type="hidden" name="jumlah_baris" value="<?= $jumlah_baris ?>">
            <table border="1" cellpadding="5">
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>

                <?php
                $data_nama = $_POST['nama_barang'] ?? [];
                $data_jumlah = $_POST['jumlah'] ?? [];
                $data_harga = $_POST['harga'] ?? [];

                for ($i = 0; $i < $jumlah_baris; $i++) {
                    $valNama = isset($data_nama[$i]) ? htmlspecialchars($data_nama[$i]) : '';
                    $valJumlah = isset($data_jumlah[$i]) ? htmlspecialchars($data_jumlah[$i]) : '';
                    $valHarga = isset($data_harga[$i]) ? htmlspecialchars($data_harga[$i]) : '';

                    echo "<tr>
                        <td><input type='text' name='nama_barang[]' value='$valNama' required></td>
                        <td><input type='number' name='jumlah[]' value='$valJumlah' required></td>
                        <td><input type='number' step='0.01' name='harga[]' value='$valHarga' required></td>
                    </tr>";
                }
                ?>
            </table>

            <br>
            <button type="submit" name="tambah_baris">Tambah Baris</button>
            <button type="submit" name="simpan_barang">Simpan Barang</button>
        </form>

        <hr>

        <h3>Daftar Barang dalam Nota Ini</h3>
        <table border="1" cellpadding="5">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM barang WHERE no_nota='$no_nota'");
            $no = 1;
            $total = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$no}</td>
                    <td>{$row['nama_barang']}</td>
                    <td>{$row['jumlah']}</td>
                    <td>Rp" . number_format($row['harga'], 0, ',', '.') . "</td>
                    <td>Rp" . number_format($row['sub_total'], 0, ',', '.') . "</td>
                </tr>";
                $total += $row['sub_total'];
                $no++;
            }
            ?>
            <tr>
                <td colspan="4" align="right"><strong>Total</strong></td>
                <td><strong>Rp<?= number_format($total, 0, ',', '.') ?></strong></td>
            </tr>
        </table>
    </div>
</body>

</html>