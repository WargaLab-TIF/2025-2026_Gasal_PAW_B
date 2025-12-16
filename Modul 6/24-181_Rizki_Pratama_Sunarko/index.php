<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container bg-white p-4 rounded shadow-sm">
        <h2 class="mb-4 text-center">Manajemen Transaksi (Nota & Item)</h2>

        <!-- Pesan status -->
        <?php if (isset($_GET['status'])): ?>
            <div class="alert <?= $_GET['status'] == 'sukses' ? 'alert-success' : ($_GET['status'] == 'deleted' ? 'alert-info' : 'alert-danger') ?> shadow-sm">
                <?= $_GET['status'] == 'sukses' ? 'Transaksi berhasil disimpan!' : ($_GET['status'] == 'deleted' ? 'Transaksi berhasil dihapus.' : ($_GET['status'] == 'stok_kurang' ? 'Stok barang tidak mencukupi!' : 'Terjadi kesalahan saat memproses data.')) ?>
            </div>
        <?php endif; ?>

        <!-- Navigasi Tab -->
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item"><button class="nav-link active" onclick="showTab('barang', this)">Barang</button></li>
            <li class="nav-item"><button class="nav-link" onclick="showTab('nota', this)">Nota</button></li>
            <li class="nav-item"><button class="nav-link" onclick="showTab('tambah', this)">Tambah</button></li>
        </ul>

        <!-- TAB: Barang -->
        <div id="barang" class="tab-content">
            <h5>Daftar Barang</h5>
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Supplier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT b.id,b.kode_barang,b.nama_barang,b.harga,b.stok,s.nama AS supplier FROM barang b LEFT JOIN supplier s ON b.supplier_id=s.id ORDER BY b.id ASC");
                    while ($r = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$r['id']}</td>
                                <td>{$r['kode_barang']}</td>
                                <td>{$r['nama_barang']}</td>
                                <td>Rp " . number_format($r['harga'], 0, ',', '.') . "</td>
                                <td>{$r['stok']}</td>
                                <td>{$r['supplier']}</td>
                                </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- TAB: Nota -->
        <div id="nota" class="tab-content hidden">
            <h5>Daftar Nota Transaksi</h5>
            <table class="table table-bordered table-striped mt-3">
                <thead class="table-primary">
                    <tr>
                        <th>ID Nota</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Total Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT n.id_nota,n.tanggal,p.nama AS pelanggan,n.total_harga FROM nota n LEFT JOIN pelanggan p ON n.id_pelanggan=p.id ORDER BY n.id_nota DESC");
                    while ($r = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                        <td>{$r['id_nota']}</td>
                        <td>{$r['tanggal']}</td>
                        <td>{$r['pelanggan']}</td>
                        <td>Rp " . number_format($r['total_harga'], 2, ',', '.') . "</td>
                        <td>
                            <a href='detail_nota.php?id={$r['id_nota']}' class='btn btn-sm btn-primary'>Detail</a>
                            <a href='hapus_nota.php?id={$r['id_nota']}' class='btn btn-sm btn-danger'>Hapus</a>
                        </td>
                        </tr>";
                            }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- TAB: Tambah -->
        <div id="tambah" class="tab-content hidden">
            <h5>Tambah Transaksi Baru</h5>
            <form method="post" action="simpan_nota.php" id="formTransaksi">
                <div class="mb-3">
                    <label class="form-label">Pelanggan</label>
                    <select name="id_pelanggan" class="form-select">
                        <option value="">-- Pilih Pelanggan --</option>
                        <?php
                        $pel = mysqli_query($conn, "SELECT id,nama FROM pelanggan ORDER BY nama ASC");
                        while ($p = mysqli_fetch_assoc($pel)) {
                            echo "<option value='{$p['id']}'>{$p['nama']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required>
                </div>

                <table class="table table-bordered" id="detailTable">
                    <thead class="table-light">
                        <tr>
                            <th>Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="item-row">
                            <td>
                                <select name="id_barang[]" class="form-select barang-select" onchange="updateHarga(this)">
                                    <option value="">-- Pilih Barang --</option>
                                    <?php
                                    $barang = mysqli_query($conn, "SELECT id,nama_barang,harga,stok FROM barang WHERE stok>0 ORDER BY nama_barang ASC");
                                    while ($b = mysqli_fetch_assoc($barang)) {
                                        echo "<option value='{$b['id']}' data-harga='{$b['harga']}' data-stok='{$b['stok']}'>{$b['nama_barang']} (Stok: {$b['stok']})</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><input type="number" name="harga[]" class="form-control harga-input" readonly></td>
                            <td><input type="number" name="qty[]" class="form-control qty-input" min="1" onchange="hitungSubtotal(this)"></td>
                            <td><input type="number" class="form-control subtotal-input" readonly></td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm" onclick="hapusBaris(this)">✖</button></td>
                        </tr>
                    </tbody>
                </table>

                <button type="button" class="btn btn-info btn-sm" onclick="tambahBaris()">+ Tambah Item</button>

                <div class="mt-3 p-3 bg-light rounded">
                    <strong>Total: <span id="totalKeseluruhan" class="text-success">Rp 0</span></strong>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showTab(id, btn) {
            document.querySelectorAll('.tab-content').forEach(e => e.classList.add('hidden'));
            document.querySelectorAll('.nav-link').forEach(b => b.classList.remove('active'));
            document.getElementById(id).classList.remove('hidden');
            btn.classList.add('active');
        }

        function tambahBaris() {
            const table = document.querySelector('#detailTable tbody');
            const row = document.querySelector('.item-row').cloneNode(true);
            row.querySelectorAll('input').forEach(i => i.value = '');
            row.querySelector('select').selectedIndex = 0;
            table.appendChild(row);
        }

        function hapusBaris(btn) {
            const tbody = document.querySelector('#detailTable tbody');
            if (tbody.querySelectorAll('tr').length > 1) {
                btn.closest('tr').remove();
                hitungTotal();
            }
        }

        function updateHarga(select) {
            const row = select.closest('tr');
            const harga = select.selectedOptions[0]?.dataset.harga || 0;
            const stok = select.selectedOptions[0]?.dataset.stok || 0;
            row.querySelector('.harga-input').value = harga;
            row.querySelector('.qty-input').max = stok;
            hitungSubtotal(row.querySelector('.qty-input'));
        }

        function hitungSubtotal(input) {
            const row = input.closest('tr');
            const harga = parseFloat(row.querySelector('.harga-input').value) || 0;
            const qty = parseFloat(input.value) || 0;
            const stok = parseFloat(row.querySelector('.barang-select').selectedOptions[0]?.dataset.stok) || 0;
            if (qty > stok) {
                const msg = document.createElement('div');
                msg.className = 'alert alert-warning mt-2';
                msg.textContent = `Stok tidak mencukupi! Maksimal: ${stok}`;
                document.querySelector('.container').prepend(msg);
                setTimeout(() => msg.remove(), 2500);
                input.value = stok;
            }
            const subtotal = harga * qty;
            row.querySelector('.subtotal-input').value = subtotal;
            hitungTotal();
        }

        function hitungTotal() {
            let total = 0;
            document.querySelectorAll('.subtotal-input').forEach(i => total += parseFloat(i.value) || 0);
            document.getElementById('totalKeseluruhan').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }
    </script>
</body>

</html>