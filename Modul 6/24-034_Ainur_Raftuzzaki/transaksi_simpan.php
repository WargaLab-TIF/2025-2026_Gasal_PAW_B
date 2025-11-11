<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pelanggan = $_POST['nama_pelanggan'] ?? '';
    $tanggal        = $_POST['tanggal'] ?? '';
    $nama_barang    = $_POST['nama_barang'] ?? [];
    $qty            = $_POST['qty'] ?? [];
    $harga          = $_POST['harga'] ?? [];

    if (empty($nama_pelanggan) || empty($tanggal) || count($nama_barang) == 0) {
        die("Data tidak lengkap. Silakan isi semua field.");
    }

    $total_harga = 0;
    for ($i = 0; $i < count($nama_barang); $i++) {
        $total_harga += $qty[$i] * $harga[$i];
    }

    $conn->begin_transaction();

    try {
        $stmt = $conn->prepare("INSERT INTO penjualan_transaksi (tanggal, nama_pelanggan, total_harga) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $tanggal, $nama_pelanggan, $total_harga);
        $stmt->execute();

        $transaksi_id = $stmt->insert_id;

        $stmt_detail = $conn->prepare("INSERT INTO penjualan_transaksi_detail (transaksi_id, nama_barang, qty, harga) VALUES (?, ?, ?, ?)");
        for ($i = 0; $i < count($nama_barang); $i++) {
            $stmt_detail->bind_param("isid", $transaksi_id, $nama_barang[$i], $qty[$i], $harga[$i]);
            $stmt_detail->execute();
        }

        $conn->commit();
        echo "Transaksi berhasil disimpan.<br><a href='transaksi_form.php'>Kembali ke Form</a>";

    } catch (Exception $e) {
        $conn->rollback();
        echo "Gagal menyimpan transaksi: " . $e->getMessage();
    }

} else {
    echo "Akses tidak sah!";
}
?>