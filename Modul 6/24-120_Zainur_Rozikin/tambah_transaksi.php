<?php include 'koneksi.php'; ?>

<form action="simpan_transaksi.php" method="POST" class="p-3 bg-white rounded shadow-sm">
    <h5 class="fw-bold mb-3">Data Transaksi (Nota)</h5>
    <div class="row mb-3">
        <div class="col-md-6">
            <label>Pelanggan</label>
            <select name="pelanggan_id" class="form-select" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php
                $pelanggan = mysqli_query($conn, "SELECT * FROM penjualan_pelanggan");
                while ($p = mysqli_fetch_assoc($pelanggan)) {
                    echo "<option value='{$p['id']}'>{$p['nama']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" required>
        </div>
    </div>

    <h5 class="fw-bold mt-4 mb-2">Detail Barang</h5>
    <table class="table table-bordered" id="table-barang">
        <thead class="table-secondary text-center">
            <tr>
                <th>Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="barang_id[]" class="form-select barang" required>
                        <option value="">-- Pilih Barang --</option>
                        <?php
                        $barang = mysqli_query($conn, "SELECT * FROM penjualan_barang");
                        while ($b = mysqli_fetch_assoc($barang)) {
                            echo "<option value='{$b['id']}' data-harga='{$b['harga']}'>{$b['nama_barang']}</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input type="number" name="harga[]" class="form-control harga" readonly></td>
                <td><input type="number" name="qty[]" class="form-control qty" min="1" required></td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-sm" onclick="hapusBaris(this)">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>

    <button type="button" class="btn btn-success btn-sm" onclick="tambahBaris()">+ Tambah Barang</button>
    <button type="submit" class="btn btn-primary mt-3 float-end">Simpan Transaksi</button>
</form>

<script>
function tambahBaris() {
    let table = document.querySelector("#table-barang tbody");
    let newRow = table.rows[0].cloneNode(true);
    newRow.querySelectorAll("input").forEach(i => i.value = "");
    newRow.querySelector("select").selectedIndex = 0;
    table.appendChild(newRow);
    addChangeEvent(newRow.querySelector(".barang"));
}

function hapusBaris(btn) {
    let table = document.querySelector("#table-barang tbody");
    if (table.rows.length > 1) {
        btn.closest("tr").remove();
    }
}

function addChangeEvent(selectElement) {
    selectElement.addEventListener("change", function() {
        let harga = this.options[this.selectedIndex].getAttribute("data-harga");
        this.closest("tr").querySelector(".harga").value = harga || 0;
    });
}

document.querySelectorAll(".barang").forEach(addChangeEvent);
</script>
