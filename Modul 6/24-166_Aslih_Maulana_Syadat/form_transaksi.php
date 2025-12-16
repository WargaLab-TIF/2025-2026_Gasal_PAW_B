<?php
session_start();
include 'koneksi.php';

$query_pelanggan = "SELECT id, nama FROM pelanggan ORDER BY nama";
$result_pelanggan = mysqli_query($koneksi, $query_pelanggan);

$query_barang = "SELECT id, nama_barang, harga, stok FROM barang WHERE stok > 0 ORDER BY nama_barang";
$result_barang = mysqli_query($koneksi, $query_barang);

$barang_options = [];
while ($b = mysqli_fetch_assoc($result_barang)) {
    $barang_options[] = $b;
}
mysqli_data_seek($result_barang, 0);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi Penjualan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Form Input Transaksi (Nota)</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?php echo $_SESSION['message_type']; ?>">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            ?>
        </div>
    <?php endif; ?>

    <form action="simpan_transaksi.php" method="POST" id="form-transaksi">
        <div class="form-group">
            <label for="pelanggan">Pelanggan:</label>
            <select id="pelanggan" name="pelanggan_id" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php while($row = mysqli_fetch_assoc($result_pelanggan)): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        
        <input type="hidden" name="user_id" value="2"> 

        <hr>

        <h3>Detail Barang</h3>
        <table id="tabel-barang">
            <thead>
                <tr>
                    <th>Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="detail-wrapper">
                <tr class="item-row">
                    <td>
                        <select name="barang_id[]" class="barang-select" required>
                            <option value="">-- Pilih Barang --</option>
                            <?php foreach($barang_options as $b): ?>
                                <option value="<?php echo $b['id']; ?>" data-harga="<?php echo $b['harga']; ?>" data-stok="<?php echo $b['stok']; ?>">
                                    <?php echo $b['nama_barang']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td><input type="text" name="harga[]" class="harga" readonly></td>
                    <td><input type="text" name="stok[]" class="stok" readonly></td>
                    <td><input type="number" name="qty[]" class="qty" min="1" value="1" required></td>
                    <td><input type="text" name="subtotal[]" class="subtotal" readonly></td>
                    <td><button type="button" class="btn btn-danger btn-hapus">Hapus</button></td>
                </tr>
            </tbody>
        </table>
        <button type="button" id="tambah-barang" class="btn btn-primary">+ Tambah Barang</button>

        <hr>

        <div id="total-display">Total Keseluruhan: Rp 0</div>
        
        <div class="form-group" style="margin-top: 20px;">
            <label for="jumlah_bayar">Jumlah Bayar:</label>
            <input type="number" id="jumlah_bayar" name="jumlah_bayar" min="0" required>
        </div>

        <button type="submit" class="btn btn-success" style="width: 100%; font-size: 1.2em;">Simpan Transaksi</button>
    </form>
</div>

<script>
    // Menyimpan data barang dalam format JSON
    const barangData = <?php echo json_encode(array_column($barang_options, null, 'id')); ?>;

    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(angka);
    }

    // Fungsi untuk menghitung ulang semua
    function updateCalculations() {
        let grandTotal = 0;
        document.querySelectorAll('.item-row').forEach(function(row) {
            const select = row.querySelector('.barang-select');
            const qtyInput = row.querySelector('.qty');
            const hargaInput = row.querySelector('.harga');
            const stokInput = row.querySelector('.stok');
            const subtotalInput = row.querySelector('.subtotal');
            
            const selectedId = select.value;
            if (selectedId && barangData[selectedId]) {
                const barang = barangData[selectedId];
                const harga = parseFloat(barang.harga);
                const stok = parseInt(barang.stok);
                let qty = parseInt(qtyInput.value) || 0;
                
                // Batas Qty agar tidak melebihi stok
                if (qty > stok) {
                    qty = stok;
                    qtyInput.value = stok;
                }
                if (qty < 1) {
                    qty = 1;
                    qtyInput.value = 1;
                }

                const subtotal = harga * qty;

                hargaInput.value = formatRupiah(harga);
                stokInput.value = stok;
                subtotalInput.value = formatRupiah(subtotal);
                grandTotal += subtotal;
            } else {
                hargaInput.value = '';
                stokInput.value = '';
                subtotalInput.value = '';
            }
        });
        document.getElementById('total-display').textContent = 'Total Keseluruhan: ' + formatRupiah(grandTotal);
    }

    // Event listener untuk elemen yang sudah ada atau yang baru ditambahkan
    const detailWrapper = document.getElementById('detail-wrapper');
    
    detailWrapper.addEventListener('change', function(e) {
        if (e.target.classList.contains('barang-select')) {
            updateCalculations();
        }
    });

    detailWrapper.addEventListener('input', function(e) {
        if (e.target.classList.contains('qty')) {
            updateCalculations();
        }
    });

    // Hapus baris barang
    detailWrapper.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-hapus')) {

            if (document.querySelectorAll('.item-row').length > 1) {
                e.target.closest('tr').remove();
                updateCalculations();
            } else {
                alert('Minimal harus ada 1 barang dalam transaksi.');
            }
        }
    });

    // Tambah baris barang baru
    document.getElementById('tambah-barang').addEventListener('click', function() {
        const wrapper = document.getElementById('detail-wrapper');
        const firstRow = wrapper.querySelector('.item-row');
        const newRow = firstRow.cloneNode(true); // Klon baris pertama
        
        // Reset nilai-nilai di baris baru
        newRow.querySelector('select').value = '';
        newRow.querySelector('.harga').value = '';
        newRow.querySelector('.stok').value = '';
        newRow.querySelector('.qty').value = '1';
        newRow.querySelector('.subtotal').value = '';
        
        wrapper.appendChild(newRow);
    });

    updateCalculations();
</script>

</body>
</html>