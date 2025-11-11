<?php
require "koneksi.php";

$sqlBarang = mysqli_query($conn, "SELECT * FROM barang");
$sqlPelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Input Transaksi</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script>
function ambilDataBarang(select) {
    const opt = select.options[select.selectedIndex];
    const row = select.closest("tr");
    row.querySelector('input[name="nama_barang[]"]').value = opt.getAttribute("data-nama") || "";
    row.querySelector('input[name="harga[]"]').value = opt.getAttribute("data-harga") || "";
}

function tambahBaris() {
    const table = document.getElementById("tabelBarang").getElementsByTagName('tbody')[0];
    const template = document.getElementById("row-template").content.cloneNode(true);
    table.appendChild(template);
}

function hapusBaris(btn) {
    btn.closest("tr").remove();
}
</script>
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Form Input Transaksi</h3>
        </div>
        <div class="card-body">
            <form action="simpan_transaksi.php" method="POST">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Tanggal Transaksi</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Pelanggan</label>
                        <select name="pelanggan_id" class="form-select" required>
                            <option value="">-- Pilih Pelanggan --</option>
                            <?php while($p = mysqli_fetch_assoc($sqlPelanggan)) { ?>
                                <option value="<?= $p['id']; ?>"><?= htmlspecialchars($p['nama']); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <h5 class="mt-4 mb-3">Detail Barang</h5>
                <div class="table-responsive">
                    <table id="tabelBarang" class="table table-bordered align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th width="15%">Kode</th>
                                <th width="25%">Nama Barang</th>
                                <th width="15%">Harga</th>
                                <th width="10%">Qty</th>
                                <th width="25%">Keterangan</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="kode_barang[]" class="form-select" onchange="ambilDataBarang(this)" required>
                                        <option value="">-- Pilih --</option>
                                        <?php
                                        mysqli_data_seek($sqlBarang, 0);
                                        while($b = mysqli_fetch_assoc($sqlBarang)) {
                                            echo "<option value='{$b['kode_barang']}' data-nama='{$b['nama_barang']}' data-harga='{$b['harga']}'>
                                                  {$b['kode_barang']}</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td><input type="text" name="nama_barang[]" class="form-control" readonly></td>
                                <td><input type="number" name="harga[]" class="form-control" required></td>
                                <td><input type="number" name="qty[]" class="form-control" value="1" min="1" required></td>
                                <td><input type="text" name="keterangan[]" class="form-control" placeholder="Opsional"></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-outline-success" onclick="tambahBaris()">+ Tambah Barang</button>
                    <button type="submit" class="btn btn-primary"> Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Daftar Barang</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    mysqli_data_seek($sqlBarang, 0);
                    if($sqlBarang && mysqli_num_rows($sqlBarang) > 0){
                        while($row = mysqli_fetch_assoc($sqlBarang)){
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($row['kode_barang'])."</td>";
                            echo "<td>".htmlspecialchars($row['nama_barang'])."</td>";
                            echo "<td>Rp ".number_format($row['harga'], 0, ',', '.')."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>Data barang tidak ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<template id="row-template">
<tr>
    <td>
        <select name="kode_barang[]" class="form-select" onchange="ambilDataBarang(this)" required>
            <option value="">-- Pilih --</option>
            <?php
            mysqli_data_seek($sqlBarang, 0);
            while($b = mysqli_fetch_assoc($sqlBarang)) {
                echo "<option value='{$b['kode_barang']}' data-nama='{$b['nama_barang']}' data-harga='{$b['harga']}'>
                      {$b['kode_barang']}</option>";
            }
            ?>
        </select>
    </td>
    <td><input type="text" name="nama_barang[]" class="form-control" readonly></td>
    <td><input type="number" name="harga[]" class="form-control" required></td>
    <td><input type="number" name="qty[]" class="form-control" value="1" min="1" required></td>
    <td><input type="text" name="keterangan[]" class="form-control" placeholder="Opsional"></td>
    <td class="text-center"><button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">Hapus</button></td>
</tr>
</template>

</body>
</html>
