<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Transaksi</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { border-collapse: collapse; width: 80%; margin-top: 20px; }
        td, th { padding: 8px; border: 1px solid #ccc; text-align: center; }
        input { padding: 5px; }
    </style>
</head>
<body>
    <h2>Form Input Transaksi</h2>
    <form action="simpan.php" method="POST">
        <label>Nomor Nota:</label>
        <input type="text" name="no_nota" required><br><br>

        <label>Nama Pembeli:</label>
        <input type="text" name="nama" required><br><br>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" required><br><br>

        <h3>Detail Barang</h3>
        <table id="barangTable">
            <tr>
                <th>Nama Barang</th>
                <th>Harga (Rp)</th>
                <th>Jumlah</th>
                <th>Subtotal (Rp)</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td><input type="text" name="barang[]" required></td>
                <td><input type="number" name="harga[]" step="0.01" required oninput="hitungSubtotal(this)"></td>
                <td><input type="number" name="jumlah[]" required oninput="hitungSubtotal(this)"></td>
                <td><input type="text" name="subtotal[]" readonly></td>
                <td><button type="button" onclick="hapusRow(this)">Hapus</button></td>
            </tr>
        </table>
        <br>
        <button type="button" onclick="tambahRow()">+ Tambah Barang</button>
        <br><br>
        <label><strong>Total (Rp):</strong></label>
        <input type="text" id="total" name="total" readonly><br><br>

        <button type="submit">Simpan Transaksi</button>
    </form>

    <script>
        function tambahRow() {
            const table = document.getElementById("barangTable");
            const row = table.insertRow();
            row.innerHTML = `
                <td><input type="text" name="barang[]" required></td>
                <td><input type="number" name="harga[]" step="0.01" required oninput="hitungSubtotal(this)"></td>
                <td><input type="number" name="jumlah[]" required oninput="hitungSubtotal(this)"></td>
                <td><input type="text" name="subtotal[]" readonly></td>
                <td><button type="button" onclick="hapusRow(this)">Hapus</button></td>
            `;
        }

        function hapusRow(btn) {
            btn.parentElement.parentElement.remove();
            hitungTotal();
        }

        function hitungSubtotal(el) {
            const row = el.parentElement.parentElement;
            const harga = parseFloat(row.querySelector('input[name="harga[]"]').value) || 0;
            const jumlah = parseInt(row.querySelector('input[name="jumlah[]"]').value) || 0;
            const subtotal = harga * jumlah;
            row.querySelector('input[name="subtotal[]"]').value = subtotal.toFixed(2);
            hitungTotal();
        }

        function hitungTotal() {
            let total = 0;
            document.querySelectorAll('input[name="subtotal[]"]').forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            document.getElementById("total").value = total.toFixed(2);
        }
    </script>
</body>
</html>
