<?php
require_once 'koneksi.php';

$resBarang = mysqli_query($koneksi, "SELECT id,nama_barang,harga,stok FROM barang ORDER BY nama_barang");
$barangOptions = '';
if ($resBarang) {
    while ($b = mysqli_fetch_assoc($resBarang)) {
        $id = (int)$b['id'];
        $n  = htmlspecialchars($b['nama_barang'], ENT_QUOTES, 'UTF-8');
        $h  = (float)$b['harga'];
        $s  = (int)$b['stok'];
        $barangOptions .= "<option value=\"{$n}\" data-id=\"{$id}\" data-harga=\"{$h}\" data-stok=\"{$s}\">{$n} (Stok: {$s})</option>";
    }
}

if (!isset($errors) || !is_array($errors)) { $errors = []; }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="border-bottom pb-3 mb-4">
            <h1 class="h3 mb-0 text-info">Tambah data transaksi</h1>
        </div>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $err): ?>
                        <li><?php echo htmlspecialchars($err); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div class="alert alert-success">Transaksi berhasil disimpan. ID Nota:
                <strong><?php echo htmlspecialchars($_GET['nota_id']); ?></strong>
            </div>
        <?php endif; ?>

        <form method="post" id="transaksiForm" action="nota_transaksi.php">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">No. Nota</label>
                    <input type="text" name="no_nota" class="form-control" value="NT-<?php echo date('YmdHis'); ?>"
                        required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>"
                        required>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="button" id="addRow" class="btn btn-sm btn-primary">Tambah Barang</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="detailTable">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width:40%">Nama Barang</th>
                            <th style="width:15%">Qty</th>
                            <th style="width:20%">Harga</th>
                            <th style="width:15%">Subtotal</th>
                            <th style="width:10%">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="barang[]" class="form-select barang-select" required>
                                    <option value="" disabled selected>Pilih barang</option>
                                    <?php echo $barangOptions; ?>
                                </select>
                            </td>
                            <td><input type="number" name="qty[]" class="form-control qty" min="1" value="1" required></td>
                            <td><input type="number" name="harga[]" class="form-control harga" min="0" step="0.01"
                                    value="0" required></td>
                            <td class="text-end"><span class="subtotal">0.00</span></td>
                            <td class="text-center"><button type="button"
                                    class="btn btn-sm btn-danger removeRow">-</button></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total</strong></td>
                            <td class="text-end"><strong id="total">0.00</strong></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-3">
                <button type="submit" name="save" class="btn btn-success">Simpan Transaksi</button>
                <a href="form_transaksi.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function recalcRow(row) {
            const q = parseFloat(row.querySelector('.qty').value) || 0;
            const h = parseFloat(row.querySelector('.harga').value) || 0;
            const sub = q * h;
            row.querySelector('.subtotal').textContent = sub.toFixed(2);
            recalcTotal();
        }

        function recalcTotal() {
            let total = 0;
            document.querySelectorAll('#detailTable tbody tr').forEach(function (row) {
                const sub = parseFloat(row.querySelector('.subtotal').textContent) || 0;
                total += sub;
            });
            document.getElementById('total').textContent = total.toFixed(2);
        }

        function setHargaFromSelect(sel) {
            const opt = sel.options[sel.selectedIndex];
            if (opt && opt.dataset.harga) {
                const row = sel.closest('tr');
                const hargaInput = row.querySelector('.harga');
                if (hargaInput.value === '0' || !hargaInput.dataset.touched) {
                    hargaInput.value = opt.dataset.harga;
                    recalcRow(row);
                }
            }
        }

        document.getElementById('addRow').addEventListener('click', function () {
            const tbody = document.querySelector('#detailTable tbody');
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>
                    <select name="barang[]" class="form-select barang-select" required>
                        <option value="" disabled selected>Pilih barang</option>
                        <?php echo $barangOptions; ?>
                    </select>
                </td>
                <td><input type="number" name="qty[]" class="form-control qty" min="1" value="1" required></td>
                <td><input type="number" name="harga[]" class="form-control harga" min="0" step="0.01" value="0" required></td>
                <td class="text-end"><span class="subtotal">0.00</span></td>
                <td class="text-center"><button type="button" class="btn btn-sm btn-danger removeRow">-</button></td>
            `;
            tbody.appendChild(tr);
        });

        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('removeRow')) {
                const row = e.target.closest('tr');
                const tbody = document.querySelector('#detailTable tbody');
                if (tbody.querySelectorAll('tr').length > 1) {
                    row.remove();
                    recalcTotal();
                } else {
                    row.querySelector('input[name="barang[]"]').value = '';
                    row.querySelector('.qty').value = 1;
                    row.querySelector('.harga').value = 0;
                    row.querySelector('.subtotal').textContent = '0.00';
                    recalcTotal();
                }
            }
        });

        document.addEventListener('change', function(e){
            if (e.target.classList.contains('barang-select')) {
                setHargaFromSelect(e.target);
            }
        });

        document.addEventListener('input', function(e){
            if (e.target.classList.contains('harga')) {
                e.target.dataset.touched = '1';
            }
        });

        document.querySelectorAll('#detailTable tbody tr').forEach(function (row) { recalcRow(row); });
    </script>
</body>

</html>