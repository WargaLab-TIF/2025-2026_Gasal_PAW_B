<?php
require "koneksi.php";

$sqlBarangDropdown = mysqli_query($conn, "SELECT * FROM barang");
$sqlBarangList = mysqli_query($conn, "SELECT * FROM barang");
$sqlPelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Input Transaksi Manual</title>
<link rel="stylesheet" href="style.css">
<script>
function ambilDataBarang(select) {
    const opt = select.options[select.selectedIndex];
    const row = select.closest("tr");
    row.querySelector('input[name="nama_barang[]"]').value = opt.getAttribute("data-nama") || "";
    row.querySelector('input[name="harga[]"]').value = opt.getAttribute("data-harga") || "";
}

function tambahBaris() {
    const table = document.getElementById("tabelBarang");
    const template = document.getElementById("row-template").content.cloneNode(true);
    table.appendChild(template);
}

function hapusBaris(btn) {
    btn.closest("tr").remove();
}
</script>
</head>
<body>

<h2>Input Transaksi</h2>

<form action="simpan_transaksi.php" method="POST">
    <h4>Tanggal Transaksi:</h4>
    <input type="date" name="tanggal" required>

    <h4>Pilih Pelanggan:</h4>
    <select name="pelanggan_id" required>
        <option value="">-- Pilih Pelanggan --</option>
        <?php while($p = mysqli_fetch_assoc($sqlPelanggan)) { ?>
            <option value="<?= $p['id']; ?>"><?= htmlspecialchars($p['nama']); ?></option>
        <?php } ?>
    </select>

    <h3>Input Barang</h3>

    <table id="tabelBarang" border="1" cellpadding="5">
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td>
                <select name="kode_barang[]" onchange="ambilDataBarang(this)" required>
                    <option value="">-- Pilih Kode --</option>
                    <?php
                    mysqli_data_seek($sqlBarangDropdown, 0);
                    while($b = mysqli_fetch_assoc($sqlBarangDropdown)) {
                        echo "<option value='{$b['kode_barang']}'
                            data-nama='{$b['nama_barang']}'
                            data-harga='{$b['harga']}'>
                            {$b['kode_barang']}</option>";
                    }
                    ?>
                </select>
            </td>
            <td><input type="text" name="nama_barang[]" required></td>
            <td><input type="number" name="harga[]" required></td>
            <td><input type="number" name="qty[]" value="1" min="1" required></td>
            <td><input type="text" name="keterangan[]" placeholder="Keterangan"></td>
            <td><button type="button" onclick="hapusBaris(this)">Hapus</button></td>
        </tr>
    </table>

    <button type="button" onclick="tambahBaris()">Tambah Barang</button>
    <br><br>
    <button type="submit">Simpan Transaksi</button>
</form>

<hr>
<h2>Daftar Barang</h2>
<table>
    <tr>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
    </tr>
    <?php
    if($sqlBarangList && mysqli_num_rows($sqlBarangList) > 0){
        while($row = mysqli_fetch_assoc($sqlBarangList)){
            echo "<tr>";
            echo "<td>".htmlspecialchars($row['kode_barang'])."</td>";
            echo "<td>".htmlspecialchars($row['nama_barang'])."</td>";
            echo "<td>".number_format($row['harga'], 0, ',', '.')."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Data barang tidak ditemukan</td></tr>";
    }
    ?>
</table>
<template id="row-template">
<tr>
    <td>
        <select name="kode_barang[]" onchange="ambilDataBarang(this)" required>
            <option value="">-- Pilih Kode --</option>
            <?php
            mysqli_data_seek($sqlBarangDropdown, 0);
            while($b = mysqli_fetch_assoc($sqlBarangDropdown)) {
                echo "<option value='{$b['kode_barang']}'
                    data-nama='{$b['nama_barang']}'
                    data-harga='{$b['harga']}'>
                    {$b['kode_barang']}</option>";
            }
            ?>
        </select>
    </td>
    <td><input type="text" name="nama_barang[]" required></td>
    <td><input type="number" name="harga[]" required></td>
    <td><input type="number" name="qty[]" value="1" min="1" required></td>
    <td><input type="text" name="keterangan[]" placeholder="Keterangan"></td>
    <td><button type="button" onclick="hapusBaris(this)">Hapus</button></td>
</tr>
</template>

</body>
</html>
