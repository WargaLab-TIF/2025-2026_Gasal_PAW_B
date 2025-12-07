<?php
require_once "koneksi.php";

if (isset($_POST)) {
    $result = mysqli_query($conn, "SELECT * FROM user");
    $user = mysqli_fetch_assoc($result);
    $no_nota =  date('Ymdhisv');

    if (isset($_POST['idbarang']) && isset($_POST['jumlahbarang'])) {
        $idbarang = $_POST['idbarang'];
        $jumlah_barang = $_POST['jumlahbarang'];
        $keterangan = $_POST['keterangan'] ?? "";

        $SQL = "INSERT into nota_penjualan (no_nota, id_user, keterangan) VALUES ('$no_nota', '" . $user['id_user'] . "', '$keterangan')";

        $insertTransaksi = mysqli_query($conn, $SQL);

        for ($i = 0; $i < count($jumlah_barang); $i++) {
            $barang = mysqli_query($conn, "SELECT harga, stok FROM barang WHERE id='$idbarang[$i]'");
            $barang = mysqli_fetch_assoc($barang);
            $SQL = "INSERT INTO item_penjualan (no_nota, barang_id, qty, subtotal) VALUES (
                    '$no_nota',
                    '$idbarang[$i]',
                    '$jumlah_barang[$i]',
                    '" . (int) $barang['harga'] * (int) $jumlah_barang . "'
                )";
            mysqli_query($conn, $SQL);
        }
        echo "Berhasil Menambahkan Data";
    } else {
        die('wajib ada barang minimal 1');
    }
}
