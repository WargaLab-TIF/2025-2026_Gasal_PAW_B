<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Documents</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center py-10">

<div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-3xl">
    <h1 class="text-2xl font-bold mb-4 text-center text-blue-600">Form Input Transaksi</h1>

    <form action="simpan.php" method="POST" id="formTransaksi">
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Tanggal Nota</label>
            <input type="date" name="tgl_nota" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" required>
        </div>

        <h2 class="text-xl font-semibold mb-2 mt-4 text-gray-700">Detail Barang</h2>
        <table class="w-full text-sm border mb-4" id="tabelBarang">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="p-2">Nama Barang</th>
                    <th class="p-2">Harga</th>
                    <th class="p-2">Qty</th>
                    <th class="p-2">Subtotal</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="nama_barang[]" class="border p-2 w-full" required></td>
                    <td><input type="number" step="0.01" name="harga[]" class="border p-2 w-full harga" required></td>
                    <td><input type="number" name="qty[]" class="border p-2 w-full qty" required></td>
                    <td><input type="text" name="subtotal[]" class="border p-2 w-full subtotal bg-gray-100" readonly></td>
                    <td><button type="button" class="hapusRow text-red-600 font-bold">X</button></td>
                </tr>
            </tbody>
        </table>

        <button type="button" id="tambahRow" class="bg-green-500 text-white px-3 py-1 rounded">+ Tambah Barang</button>

        <div class="text-right mt-4">
            <label class="font-bold text-lg">Total: Rp <span id="total">0</span></label>
        </div>

        <div class="mt-6 text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold">Simpan Transaksi</button>
        </div>
    </form>
</div>

<script>
document.getElementById('tambahRow').addEventListener('click', function() {
    const tbody = document.querySelector('#tabelBarang tbody');
    const tr = document.createElement('tr');
    tr.innerHTML = `
        <td><input type="text" name="nama_barang[]" class="border p-2 w-full" required></td>
        <td><input type="number" step="0.01" name="harga[]" class="border p-2 w-full harga" required></td>
        <td><input type="number" name="qty[]" class="border p-2 w-full qty" required></td>
        <td><input type="text" name="subtotal[]" class="border p-2 w-full subtotal bg-gray-100" readonly></td>
        <td><button type="button" class="hapusRow text-red-600 font-bold">X</button></td>
    `;
    tbody.appendChild(tr);
});

document.addEventListener('input', function(e) {
    if (e.target.classList.contains('harga') || e.target.classList.contains('qty')) {
        const row = e.target.closest('tr');
        const harga = parseFloat(row.querySelector('.harga').value) || 0;
        const qty = parseInt(row.querySelector('.qty').value) || 0;
        const subtotal = harga * qty;
        row.querySelector('.subtotal').value = subtotal.toFixed(2);
    }

    let total = 0;
    document.querySelectorAll('.subtotal').forEach(sub => {
        total += parseFloat(sub.value) || 0;
    });
    document.getElementById('total').textContent = total.toFixed(2);
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('hapusRow')) {
        e.target.closest('tr').remove();
    }
});
</script>

</body>
</html>
