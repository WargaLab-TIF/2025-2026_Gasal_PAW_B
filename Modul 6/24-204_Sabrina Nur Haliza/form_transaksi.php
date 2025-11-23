<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 6px 8px;
            margin: 6px 0 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .item {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 10px;
            background: #f9f9f9;
        }
        .submit-btn {
            width: 100%;
            margin-top: 15px;
            background: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <h2>Form Input Transaksi</h2>

    <form method="POST" action="simpan_transaksi.php">
        <label>No Nota:</label>
        <input type="text" name="no_nota" placeholder="Contoh: N001" required>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" required>

        <label>Nama Pelanggan:</label>
        <input type="text" name="nama_pelanggan" placeholder="Nama pelanggan..." required>

        <h3>Detail Barang</h3>

        <!-- Barang 1 (wajib) -->
        <div class="item">
            <label>Nama Barang 1:</label>
            <input type="text" name="nama_barang[]" placeholder="Nama barang..." required>
            <label>Jumlah 1:</label>
            <input type="number" name="jumlah[]" min="1" placeholder="Qty" required>
            <label>Harga 1:</label>
            <input type="number" name="harga[]" min="0" placeholder="Harga per barang" required>
        </div>

        <!-- Barang 2 (opsional) -->
        <div class="item">
            <label>Nama Barang 2:</label>
            <input type="text" name="nama_barang[]" placeholder="Nama barang...">
            <label>Jumlah 2:</label>
            <input type="number" name="jumlah[]" min="1" placeholder="Qty">
            <label>Harga 2:</label>
            <input type="number" name="harga[]" min="0" placeholder="Harga per barang">
        </div>

        <!-- Barang 3 (opsional) -->
        <div class="item">
            <label>Nama Barang 3:</label>
            <input type="text" name="nama_barang[]" placeholder="Nama barang...">
            <label>Jumlah 3:</label>
            <input type="number" name="jumlah[]" min="1" placeholder="Qty">
            <label>Harga 3:</label>
            <input type="number" name="harga[]" min="0" placeholder="Harga per barang">
        </div>

        <input type="submit" name="simpan" value="Simpan Transaksi" class="submit-btn">
    </form>

</body>
</html>
