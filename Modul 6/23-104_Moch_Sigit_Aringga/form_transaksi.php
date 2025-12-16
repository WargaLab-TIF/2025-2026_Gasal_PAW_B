<?php
require_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>🧾 Form Input Transaksi</h2>

    <form action="simpan_transaksi.php" method="POST">
        <!-- MASTER -->
        <fieldset>
            <legend>Data Transaksi</legend>
            <p>
                <label for="nomor_nota">Nomor Nota:</label>
                <input type="text" id="nomor_nota" name="nomor_nota" required>
            </p>
            <p>
                <label for="tanggal_transaksi">Tanggal:</label>
                <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" 
                       value="<?php echo date('Y-m-d'); ?>" required>
            </p>
        </fieldset>

        <!-- DETAIL -->
        <fieldset>
            <legend>Input Barang</legend>
            <p>
                <label for="pilih_barang">Pilih Barang:</label>
                <select id="pilih_barang">
                    <option value="1" data-nama="Buku Tulis Sinar Dunia">Buku Tulis Sinar Dunia</option>
                    <option value="2" data-nama="Pulpen Pilot">Pulpen Pilot</option>
                    <option value="3" data-nama="Penghapus Faber-Castell">Penghapus Faber-Castell</option>
                </select>
            </p>
            <p>
                <label for="jumlah_barang">Jumlah:</label>
                <input type="number" id="jumlah_barang" value="1" min="1">
            </p>
            <button type="button" id="btn_tambah">+ Tambah ke Keranjang</button>
        </fieldset>

        <hr>

        <!-- KERANJANG -->
        <h3>🛒 Keranjang Belanja</h3>
        <table id="keranjang">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="keranjang_detail"></tbody>
        </table>

        <div id="hidden_items"></div>

        <hr>

        <button type="submit" class="submit-btn">💾 Simpan Transaksi</button>
    </form>

    <script>
        let itemCounter = 0;

        const pilihBarang = document.getElementById('pilih_barang');
        const jumlahBarang = document.getElementById('jumlah_barang');
        const keranjangDetail = document.getElementById('keranjang_detail');
        const hiddenItems = document.getElementById('hidden_items');
        const btnTambah = document.getElementById('btn_tambah');

        // Tambahkan barang ke keranjang
        btnTambah.addEventListener('click', () => {
            const idBarang = pilihBarang.value;
            const namaBarang = pilihBarang.options[pilihBarang.selectedIndex].dataset.nama;
            const jumlah = jumlahBarang.value;

            if (!jumlah || jumlah <= 0) {
                alert("Jumlah harus lebih dari 0");
                return;
            }

            // Tambahkan baris ke tabel
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${namaBarang}</td>
                <td>${jumlah}</td>
                <td><button type="button" class="btn_hapus">Hapus</button></td>
            `;
            keranjangDetail.appendChild(row);

            // Tambahkan input hidden untuk dikirim ke PHP
            const inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = `items[${itemCounter}][id_barang]`;
            inputId.value = idBarang;

            const inputJumlah = document.createElement('input');
            inputJumlah.type = 'hidden';
            inputJumlah.name = `items[${itemCounter}][jumlah]`;
            inputJumlah.value = jumlah;

            hiddenItems.appendChild(inputId);
            hiddenItems.appendChild(inputJumlah);

            itemCounter++;
            jumlahBarang.value = 1;
        });

        // Hapus item dari keranjang
        document.getElementById('keranjang').addEventListener('click', (e) => {
            if (!e.target.classList.contains('btn_hapus')) return;

            const row = e.target.closest('tr');
            const index = Array.from(keranjangDetail.children).indexOf(row);
            row.remove();

            const hiddenId = hiddenItems.querySelector(`input[name="items[${index}][id_barang]"]`);
            const hiddenJumlah = hiddenItems.querySelector(`input[name="items[${index}][jumlah]"]`);
            if (hiddenId) hiddenId.remove();
            if (hiddenJumlah) hiddenJumlah.remove();
        });
    </script>
</body>
</html>
