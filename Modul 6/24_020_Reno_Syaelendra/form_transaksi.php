<?php
require 'koneksi.php';
// Ambil Semua Data Barang untuk Dropdown
$sql_barang = "SELECT id, kode_barang, nama_barang, harga FROM master_barang WHERE stok > 0 ORDER BY nama_barang";
$result_barang = $conn->query($sql_barang);

$barang_options = [];
if ($result_barang->num_rows > 0) {
    while($row = $result_barang->fetch_assoc()) {
        $barang_options[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Transaksi Profesional</title>
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f4f4f4; }
        h2, h3 { color: #333; }
        form { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        fieldset { border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        legend { font-weight: bold; color: #0056b3; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        input[type="text"], input[type="date"], input[type="number"], select { 
            width: 95%; 
            padding: 8px; 
            margin: 4px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button { 
            padding: 10px 15px; 
            cursor: pointer; 
            border: none;
            border-radius: 4px;
            color: #fff;
        }
        button[type="submit"] { background-color: #28a745; }
        button[type="button"] { background-color: #007bff; }
        button[type="submit"]:hover { background-color: #218838; }
        button[type="button"]:hover { background-color: #0056b3; }
        .hapus-baris { color: #dc3545; cursor: pointer; text-align: center; font-weight: bold; }
        #totalDisplay { color: #28a745; font-size: 1.2em; }
    </style>
</head>
<body>

    <form action="simpan_transaksi.php" method="POST" id="formTransaksi">
        <h2>Form Input Transaksi</h2>
        <fieldset>
            <legend>Data Master (Nota)</legend>
            <p><label>No. Nota:</label><input type="text" name="no_nota" required></p>
            <p><label>Tanggal:</label><input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required></p>
            <p><label>Nama Pelanggan:</label><input type="text" name="nama_pelanggan" required></p>
        </fieldset>

        <fieldset>
            <legend>Data Detail (Barang)</legend>
            <table id="tabelBarang">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="detailBarang">
                    </tbody>
            </table>
            <br>
            <button type="button" id="tambahBarang">Tambah Barang</button>
        </fieldset>

        <hr>
        <h3>Total Keseluruhan: Rp <span id="totalDisplay">0.00</span></h3>
        <input type="hidden" name="total_keseluruhan" id="totalInput" value="0">

        <button type="submit">Simpan Transaksi</button>
    </form>

<script>
    // Data barang dari PHP
    const dataBarang = <?php echo json_encode($barang_options); ?>;

    document.getElementById('tambahBarang').addEventListener('click', function() {
        var tbody = document.getElementById('detailBarang');
        var barisBaru = tbody.insertRow();
        
        let optionsHTML = '<option value="">-- Pilih Barang --</option>';
        dataBarang.forEach(function(barang) {
            optionsHTML += `<option value="${barang.id}" data-harga="${barang.harga}">${barang.nama_barang} (${barang.kode_barang})</option>`;
        });

        barisBaru.innerHTML = `
            <td>
                <select name="barang_id[]" class="pilih-barang" required>
                    ${optionsHTML}
                </select>
            </td>
            <td><input type="number" name="harga_satuan[]" class="harga" value="0" readonly></td>
            <td><input type="number" name="jumlah[]" class="jumlah" value="1" min="1" required></td>
            <td><input type="text" name="subtotal[]" class="subtotal" value="0" readonly></td>
            <td class="hapus-baris">X</td>
        `;
    });

    document.getElementById('tabelBarang').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('hapus-baris')) {
            e.target.closest('tr').remove();
            hitungTotalKeseluruhan();
        }
    });

    function updateSubtotal(baris) {
        var harga = parseFloat(baris.querySelector('.harga').value) || 0;
        var jumlah = parseFloat(baris.querySelector('.jumlah').value) || 0;
        var subtotal = harga * jumlah;
        baris.querySelector('.subtotal').value = subtotal.toFixed(2);
        hitungTotalKeseluruhan();
    }
    
    document.getElementById('tabelBarang').addEventListener('input', function(e) {
        if (e.target && e.target.classList.contains('jumlah')) {
            updateSubtotal(e.target.closest('tr'));
        }
    });

    document.getElementById('tabelBarang').addEventListener('change', function(e) {
        if (e.target && e.target.classList.contains('pilih-barang')) {
            var selectedOption = e.target.options[e.target.selectedIndex];
            var harga = selectedOption.getAttribute('data-harga') || 0;
            
            var baris = e.target.closest('tr');
            baris.querySelector('.harga').value = parseFloat(harga).toFixed(2);
            updateSubtotal(baris);
        }
    });

    function hitungTotalKeseluruhan() {
        var semuaSubtotal = document.querySelectorAll('.subtotal');
        var total = 0;
        semuaSubtotal.forEach(function(input) {
            total += parseFloat(input.value) || 0;
        });
        
        document.getElementById('totalDisplay').textContent = total.toFixed(2);
        document.getElementById('totalInput').value = total.toFixed(2);
    }
</script>

</body>
</html>