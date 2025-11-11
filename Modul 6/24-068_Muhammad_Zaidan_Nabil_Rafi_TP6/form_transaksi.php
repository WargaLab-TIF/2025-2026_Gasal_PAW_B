<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Form Input Transaksi</h4>
        </div>
        <div class="card-body">

            <form action="simpan_transaksi.php" method="post">

                <div class="row mb-3">
                    <div class="col">
                        <label>No Nota</label>
                        <input type="text" class="form-control" name="no_nota" required>
                    </div>
                    <div class="col">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tgl_transaksi" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Customer</label>
                    <input type="text" class="form-control" name="customer" required>
                </div>

                <h5 class="mt-4 mb-3">Detail Barang</h5>

                <?php
                $barang = mysqli_query($koneksi, "SELECT * FROM barang");
                ?>

                <table class="table table-bordered" id="table-barang">
                    <thead class="table-secondary">
                        <tr>
                            <th>Nama Barang</th>
                            <th width="100px">Qty</th>
                            <th width="150px">Harga</th>
                            <th width="50px">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="nama_barang[]" class="form-control" onchange="updateHarga(this)" required>
                                    <option value="">- Pilih Barang -</option>
                                    <?php while ($row = mysqli_fetch_assoc($barang)) { ?>
                                        <option value="<?= $row['nama_barang']; ?>" data-harga="<?= $row['harga']; ?>">
                                            <?= $row['nama_barang']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="number" name="qty[]" class="form-control" placeholder="Qty" required></td>
                            <td><input type="number" name="harga[]" class="form-control" placeholder="Harga" required></td>
                            <td><button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">X</button></td>
                        </tr>
                    </tbody>
                </table>

                <button type="button" class="btn btn-success btn-sm" onclick="tambahBaris()">+ Tambah Barang</button>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-100">SIMPAN TRANSAKSI</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
function tambahBaris() {
    let table = document.getElementById("table-barang").getElementsByTagName("tbody")[0];
    let newRow = table.rows[0].cloneNode(true);

    newRow.querySelectorAll('input').forEach(input => input.value = '');
    newRow.querySelector('select').selectedIndex = 0;
    table.appendChild(newRow);
}

function hapusBaris(button) {
    let table = document.getElementById("table-barang").getElementsByTagName("tbody")[0];
    if (table.rows.length > 1) {
        button.closest('tr').remove();
    } else {
        alert("Minimal satu baris barang!");
    }
}

function updateHarga(select) {
    let harga = select.options[select.selectedIndex].getAttribute("data-harga");
    let row = select.closest('tr');
    row.querySelector('input[name="harga[]"]').value = harga || '';
}
</script>

</body>
</html>
