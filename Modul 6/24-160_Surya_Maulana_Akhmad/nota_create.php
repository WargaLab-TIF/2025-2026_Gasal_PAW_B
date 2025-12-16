<?php
require_once "koneksi.php";

$requiredNota = "";
$requiredTanggal = "";
$requiredPelanggan = "";

// Ambil data pelanggan dan barang
$pelanggan_result = mysqli_query($conn, "SELECT * FROM pelanggan");
$barang_result = mysqli_query($conn, "SELECT * FROM barang");

if (isset($_POST['submit'])) {
    $no_nota = $_POST['no_nota'];
    $tanggal = $_POST['tanggal'];
    $pelanggan_id = $_POST['pelanggan_id'];

    $barang_id = $_POST['barang_id'];
    $qty = $_POST['qty'];
    $harga = $_POST['harga'];

    // Validasi input
    if (empty($no_nota)) {
        $requiredNota = "Mohon isi nomor nota!";
    }
    if (empty($tanggal)) {
        $requiredTanggal = "Mohon isi tanggal!";
    }
    if (empty($pelanggan_id)) {
        $requiredPelanggan = "Pilih pelanggan terlebih dahulu!";
    }

    // Jika semua valid
    if (empty($requiredNota) && empty($requiredTanggal) && empty($requiredPelanggan)) {
        // Hitung total harga
        $total_harga = 0;
        for ($i = 0; $i < count($barang_id); $i++) {
            if (!empty($barang_id[$i]) && !empty($qty[$i]) && !empty($harga[$i])) {
                $subtotal = $harga[$i] * $qty[$i];
                $total_harga += $subtotal;
            }
        }

        // Simpan ke tabel nota
        $sql_nota = "INSERT INTO nota (no_nota, tanggal, pelanggan_id, total_harga)
                     VALUES ('$no_nota', '$tanggal', '$pelanggan_id', '$total_harga')";
        $insert_nota = mysqli_query($conn, $sql_nota);

        if ($insert_nota) {
            // Ambil ID nota terakhir
            $nota_id = mysqli_insert_id($conn);

            // Simpan detail transaksi
            for ($i = 0; $i < count($barang_id); $i++) {
                if (!empty($barang_id[$i]) && !empty($qty[$i]) && !empty($harga[$i])) {
                    $sql_detail = "INSERT INTO transaksi_detail (nota_id, barang_id, harga, qty)
                                   VALUES ('$nota_id', '{$barang_id[$i]}', '{$harga[$i]}', '{$qty[$i]}')";
                    mysqli_query($conn, $sql_detail);
                }
            }

            echo "<script>
                alert('Transaksi berhasil disimpan!');
                document.location.href = 'nota_index.php';
            </script>";
        } else {
            echo "<p style='color:red;'>Terjadi kesalahan saat menyimpan data.</p>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Input Transaksi (Nota)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        td,
        th {
            border: 1px solid #ccc;
            padding: 6px;
        }

        .btn {
            padding: 6px 10px;
            margin: 3px;
            cursor: pointer;
        }

        h2,
        h3 {
            color: #333;
        }
    </style>
</head>

<body>

    <h2>Form Input Transaksi (Nota)</h2>

    <form method="post">
        <label>No Nota:</label><br>
        <input type="text" name="no_nota" value="<?= isset($_POST['no_nota']) ? $_POST['no_nota'] : 'INV-' . date('YmdHis') ?>">
        <span class="error"><?= $requiredNota ?></span><br><br>

        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>">
        <span class="error"><?= $requiredTanggal ?></span><br><br>

        <label>Pelanggan:</label><br>
        <select name="pelanggan_id" required>
            <option value="">-- Pilih Pelanggan --</option>
            <?php
            if (mysqli_num_rows($pelanggan_result) > 0) {
                while ($p = mysqli_fetch_assoc($pelanggan_result)) {
                    echo "<option value='{$p['id']}'>{$p['id']} - {$p['nama']}</option>";
                }
            }
            ?>
        </select>
        <span class="error"><?= $requiredPelanggan ?></span><br><br>

        <h3>Detail Barang</h3>
        <table id="detailTable">
            <tr>
                <th>ID Barang</th>
                <th>Qty</th>
                <th>Harga</th>
            </tr>
            <tr>
                <td><input type="number" name="barang_id[]" placeholder="ID Barang"></td>
                <td><input type="number" name="qty[]" min="1" value="1"></td>
                <td><input type="number" name="harga[]" min="0" placeholder="Harga"></td>
            </tr>
        </table>

        <button type="button" onclick="tambahInput()">+ Tambah Barang</button><br><br>

        <input type="submit" name="submit" value="Simpan Transaksi">
    </form>

    <hr>

    <h3>Daftar Barang</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        <?php
        $barang_result2 = mysqli_query($conn, "SELECT * FROM barang");
        if (mysqli_num_rows($barang_result2) > 0) {
            while ($bar = mysqli_fetch_assoc($barang_result2)) {
                echo "<tr>
                    <td>{$bar['id']}</td>
                    <td>{$bar['nama_barang']}</td>
                    <td>" . $bar['harga'] . "</td>
                    <td>{$bar['stok']}</td>
                  </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Belum ada data barang.</td></tr>";
        }
        ?>
    </table>

    <script>
        // hanya untuk menambah baris input barang
        function tambahInput() {
            const table = document.getElementById('detailTable');
            const newRow = table.insertRow(-1);
            newRow.innerHTML = `
        <td><input type="number" name="barang_id[]" placeholder="ID Barang"></td>
        <td><input type="number" name="qty[]" min="1" value="1"></td>
        <td><input type="number" name="harga[]" min="0" placeholder="Harga"></td>
    `;
        }
    </script>

</body>

</html>