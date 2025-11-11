<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<head>
    <title>Form Input Transaksi</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { border-collapse: collapse; width: 80%; }
        th, td { padding: 8px; border: 1px solid #ddd; text-align: center; }
        .btn { padding: 6px 12px; margin: 5px; cursor: pointer; }
    </style>
    <script>
        function tambahBaris() {
            const table = document.getElementById("detail");
            const row = table.insertRow();
            row.innerHTML = `
                <td><select name="id_produk[]" required>
                    <?php
                        $q = mysqli_query($cont, "SELECT * FROM produk");
                        while ($d = mysqli_fetch_assoc($q)) {
                            echo "<option value='{$d['id_produk']}'>{$d['nama_produk']}</option>";
                        }
                    ?>
                </select></td>
                <td><input type="number" name="jumlah[]" min="1" required></td>
            `;
        }
    </script>
</head>
<body>
    <h2>Form Input Transaksi</h2>
    <form action="Tugas-2.php" method="post">
        <label>Pelanggan:</label>
        <select name="id_pelanggan" required>
            <option value="">-- Pilih Pelanggan --</option>
            <?php
            $pel = mysqli_query($cont, "SELECT * FROM pelanggan");
            while ($p = mysqli_fetch_assoc($pel)) {
                echo "<option value='{$p['id_pelanggan']}'>{$p['nama']}</option>";
            }
            ?>
        </select><br><br>

        <label>Tanggal Transaksi:</label>
        <input type="date" name="tanggal" required><br><br>

        <h3>Detail Barang</h3>
        <table id="detail">
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <td>
                    <select name="id_produk[]" required>
                        <?php
                        $q = mysqli_query($cont, "SELECT * FROM produk");
                        while ($d = mysqli_fetch_assoc($q)) {
                            echo "<option value='{$d['id_produk']}'>{$d['nama_produk']}</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input type="number" name="jumlah[]" min="1" required></td>
            </tr>
        </table>

        <button type="button" class="btn" onclick="tambahBaris()">+ Tambah Barang</button><br><br>

        <input type="submit" value="Simpan Transaksi" class="btn">
    </form>
</body>
</html>
