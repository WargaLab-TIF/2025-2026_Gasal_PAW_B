<?php
include 'koneksi.php';

// --- Simpan data saat form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['waktu_transaksi'];
    $keterangan = $_POST['keterangan'];
    $pelanggan_id = $_POST['pelanggan_id'];
    $barang_id = $_POST['barang_id'];
    $harga = $_POST['harga'];
    $qty = $_POST['qty'];

    // Hitung total
    $total = 0;
    for ($i = 0; $i < count($barang_id); $i++) {
        $total += $harga[$i] * $qty[$i];
    }

    // Simpan ke tabel transaksi (master)
    $stmt = $conn->prepare("INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $tanggal, $keterangan, $total, $pelanggan_id);
    $stmt->execute();
    $transaksi_id = $conn->insert_id; // Ambil ID transaksi baru

    // Simpan ke tabel detail
    $stmt_detail = $conn->prepare("INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) VALUES (?, ?, ?, ?)");
    for ($i = 0; $i < count($barang_id); $i++) {
        $stmt_detail->bind_param("iiii", $transaksi_id, $barang_id[$i], $harga[$i], $qty[$i]);
        $stmt_detail->execute();
    }

    echo "<script>alert('Transaksi berhasil disimpan!'); window.location='nota.php?id=$transaksi_id';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function tambahBaris() {
            let table = document.getElementById('detail-body');
            let row = table.insertRow();
            row.innerHTML = `
                <td>
                    <select name="barang_id[]" class="form-select" onchange="setHarga(this)">
                        <option value="">-- Pilih Barang --</option>
                        <?php
                        $b = $conn->query("SELECT * FROM barang");
                        while($r = $b->fetch_assoc()){
                            echo "<option value='{$r['id']}' data-harga='{$r['harga']}'>{$r['nama_barang']}</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input type="number" name="harga[]" class="form-control" readonly></td>
                <td><input type="number" name="qty[]" class="form-control" value="1"></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">Hapus</button></td>
            `;
        }

        function hapusBaris(btn) {
            btn.closest('tr').remove();
        }

        function setHarga(select) {
            let harga = select.options[select.selectedIndex].dataset.harga;
            select.closest('tr').querySelector('input[name="harga[]"]').value = harga;
        }
    </script>
</head>
<body>
<div class="container mt-4">
    <h3>Tambah Transaksi</h3>
    <a href="transaksi.php" class="btn btn-secondary mb-3">Kembali</a>
    <form method="post">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">Data Transaksi</div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Tanggal Transaksi</label>
                    <input type="date" name="waktu_transaksi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Pelanggan</label>
                    <select name="pelanggan_id" class="form-select" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        <?php
                        $pel = $conn->query("SELECT * FROM pelanggan");
                        while($p = $pel->fetch_assoc()){
                            echo "<option value='{$p['id']}'>{$p['nama']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-success text-white">
                Detail Barang
                <button type="button" class="btn btn-light btn-sm float-end" onclick="tambahBaris()">+ Tambah Barang</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th>Barang</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="detail-body"></tbody>
                </table>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
    </form>
</div>
</body>
</html>
