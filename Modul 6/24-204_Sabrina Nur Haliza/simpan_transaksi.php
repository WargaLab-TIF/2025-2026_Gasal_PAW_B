<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $no_nota = trim($_POST['no_nota']);
    $tanggal = $_POST['tanggal'];
    $nama_pelanggan = trim($_POST['nama_pelanggan']);
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // --- Validasi dasar ---
    if (empty($no_nota) || empty($tanggal) || empty($nama_pelanggan)) {
        die("Semua field master harus diisi!");
    }

    if (empty($nama_barang) || count($nama_barang) == 0) {
        die("Minimal satu barang harus diisi!");
    }

    // --- Cek duplikasi no nota ---
    $cek = mysqli_query($koneksi, "SELECT * FROM nota WHERE no_nota='$no_nota'");
    if (mysqli_num_rows($cek) > 0) {
        die("Nomor nota sudah ada, gunakan nomor lain!");
    }

    // --- Simpan ke tabel nota ---
    $query_master = "INSERT INTO nota (no_nota, tanggal, nama_pelanggan)
                     VALUES ('$no_nota', '$tanggal', '$nama_pelanggan')";
    $simpan_master = mysqli_query($koneksi, $query_master);

    if ($simpan_master) {
        // Simpan ke tabel detail
        for ($i = 0; $i < count($nama_barang); $i++) {
            $barang = trim($nama_barang[$i]);
            $qty = (int)$jumlah[$i];
            $harga_satuan = (float)$harga[$i];

            if ($barang != "" && $qty > 0) {
                $query_detail = "INSERT INTO detail_nota (no_nota, nama_barang, jumlah, harga)
                                 VALUES ('$no_nota', '$barang', $qty, $harga_satuan)";
                mysqli_query($koneksi, $query_detail);
            }
        }
        echo "Transaksi berhasil disimpan!";
    } else {
        echo "Gagal menyimpan data master!";
    }
}
?>
