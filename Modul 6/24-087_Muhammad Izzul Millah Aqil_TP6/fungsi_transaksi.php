<?php
require_once 'koneksi.php';

function simpanTransaksi($tanggal, $pelanggan_id, $kode_barang, $harga, $qty, $keterangan) {
    global $conn;

    $total = 0;
    foreach ($harga as $i => $h) {
        $total += $h * $qty[$i];
    }

    $queryTransaksi = "INSERT INTO transaksi (waktu_transaksi, keterangan, total, pelanggan_id)
                       VALUES ('$tanggal', 'Transaksi manual', '$total', '$pelanggan_id')";
    mysqli_query($conn, $queryTransaksi) or die("Gagal simpan transaksi: " . mysqli_error($conn));

    $id_transaksi = mysqli_insert_id($conn);

    foreach ($kode_barang as $i => $kode) {
        if (empty($kode)) continue;

        $qBarang = mysqli_query($conn, "SELECT id, stok FROM barang WHERE kode_barang='$kode'");
        $barang = mysqli_fetch_assoc($qBarang);
        if (!$barang) continue;

        $id_barang = $barang['id'];
        $h = $harga[$i];
        $q = $qty[$i];

        mysqli_query($conn, "
            INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty)
            VALUES ('$id_transaksi', '$id_barang', '$h', '$q')
        ");

        $stokBaru = $barang['stok'] - $q;
        mysqli_query($conn, "UPDATE barang SET stok='$stokBaru' WHERE id='$id_barang'");
    }

    return $id_transaksi;
}
