<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Input Transaksi</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f7f7f7;
        margin: 0;
        padding: 0;
    }
    nav {
        background-color: #007bff;
        padding: 10px;
        text-align: center;
    }
    nav a {
        color: white;
        text-decoration: none;
        font-weight: bold;
        margin: 0 15px;
        padding: 6px 12px;
    }
    nav a:hover {
        background-color: #0056b3;
        border-radius: 5px;
    }
    .container {
        background: white;
        margin: 30px auto;
        width: 90%;
        max-width: 1000px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        padding: 20px 40px;
    }
    h2 {
        text-align: center;
        color: #333;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }
    th {
        background-color: #007bff;
        color: white;
    }
    input[type=text], input[type=number], input[type=date] {
        width: 95%;
        padding: 5px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        text-align: center;
    }
    .btn {
        border: none;
        border-radius: 5px;
        padding: 7px 14px;
        cursor: pointer;
        color: white;
        font-weight: bold;
    }
    .btn-tambah {
        background-color: #28a745;
    }
    .btn-tambah:hover {
        background-color: #218838;
    }
    .btn-simpan {
        background-color: #007bff;
    }
    .btn-simpan:hover {
        background-color: #0056b3;
    }
    .tombol-row {
        text-align: right;
        padding-top: 10px;
    }
</style>
</head>
<body>

<nav>
    <a href="transaksi_form.php">Input Transaksi</a>
    <a href="transaksi_list.php">Lihat Transaksi</a>
</nav>

<div class="container">
    <h2>Form Input Transaksi</h2>
    <form action="transaksi_simpan.php" method="POST">
        <?php $nomor_nota = "NOTA-" . date("YmdHis"); ?>
        <label>Nomor Nota:</label>
        <input type="text" name="nomor" value="<?= $nomor_nota ?>" readonly><br><br>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" readonly><br><br>

        <label>Nama Pembeli:</label>
        <input type="text" name="nama_pembeli" required><br><br>

        <h3>Detail Barang</h3>
        <table id="detailTable">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="barang[]" required></td>
                    <td><input type="number" name="qty[]" min="1" value="1" oninput="updateSubtotal(this)" required></td>
                    <td><input type="number" name="harga[]" min="1" value="0" oninput="updateSubtotal(this)" required></td>
                    <td><input type="text" name="subtotal[]" readonly></td>
                    <td><button type="button" class="btn" style="background:#dc3545;" onclick="hapusBaris(this)">Hapus</button></td>
                </tr>
            </tbody>
        </table>

        <div class="tombol-row">
            <button type="button" class="btn btn-tambah" onclick="tambahBaris()">+ Tambah Barang</button>
        </div>

        <br>
        <div style="text-align:center;">
            <button type="submit" class="btn btn-simpan">Simpan Transaksi</button>
        </div>
    </form>
</div>

<script>
function tambahBaris() {
    const tbody = document.querySelector('#detailTable tbody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td><input type="text" name="barang[]" required></td>
        <td><input type="number" name="qty[]" min="1" value="1" oninput="updateSubtotal(this)" required></td>
        <td><input type="number" name="harga[]" min="1" value="0" oninput="updateSubtotal(this)" required></td>
        <td><input type="text" name="subtotal[]" readonly></td>
        <td><button type="button" class="btn" style="background:#dc3545;" onclick="hapusBaris(this)">Hapus</button></td>
    `;
    tbody.appendChild(newRow);
}
function hapusBaris(btn) {
    btn.closest('tr').remove();
}
function updateSubtotal(el) {
    const row = el.closest('tr');
    const qty = parseFloat(row.querySelector('input[name="qty[]"]').value) || 0;
    const harga = parseFloat(row.querySelector('input[name="harga[]"]').value) || 0;
    row.querySelector('input[name="subtotal[]"]').value = (qty * harga).toLocaleString('id-ID');
}
</script>

</body>
</html>
