<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form_transaksi.php');
    exit;
}

$id_pelanggan = $_POST['pelanggan_id'];
$id_user = $_POST['user_id'];
$jumlah_bayar = (int)$_POST['jumlah_bayar'];
$waktu_transaksi = date("Y-m-d H:i:s");
$id_nota = "NOTA-" . date("YmdHis"); 

$barang_ids = $_POST['barang_id'];
$qtys = $_POST['qty'];

mysqli_begin_transaction($koneksi);


$error = null;
$total_keseluruhan = 0;
$items_to_insert = [];

do {
    // Validasi Stok dan Hitung Total
    $stmt_barang_check = mysqli_prepare($koneksi, "SELECT harga, stok FROM barang WHERE id = ? FOR UPDATE");
    mysqli_stmt_bind_param($stmt_barang_check, "i", $id_barang_param);

    foreach ($barang_ids as $index => $id_barang) {
        $id_barang_param = (int)$id_barang;
        $qty = (int)$qtys[$index];
        
        if ($qty <= 0) {
            $error = "Jumlah (Qty) barang tidak boleh nol.";
            break 2; 
        }

        // Eksekusi statement cek barang
        if (!mysqli_stmt_execute($stmt_barang_check)) {
            $error = "Gagal mengambil data barang: " . mysqli_error($koneksi);
            break 2;
        }
        $result_barang = mysqli_stmt_get_result($stmt_barang_check);
        $barang = mysqli_fetch_assoc($result_barang);

        if (!$barang) {
            $error = "Barang (ID: $id_barang_param) tidak ditemukan.";
            break 2;
        }
        
        $harga_saat_transaksi = (int)$barang['harga'];
        $stok_saat_ini = (int)$barang['stok'];

        // Validasi Stok
        if ($qty > $stok_saat_ini) {
            $error = "Stok barang (ID: $id_barang_param) tidak mencukupi. Tersisa $stok_saat_ini.";
            break 2;
        }
        
        $subtotal = $harga_saat_transaksi * $qty;
        $total_keseluruhan += $subtotal;

        $items_to_insert[] = [
            'id_barang' => $id_barang_param,
            'qty' => $qty,
            'harga' => $harga_saat_transaksi,
            'subtotal' => $subtotal
        ];
    }
    mysqli_stmt_close($stmt_barang_check); 

    // Validasi Pembayaran
    $kembalian = $jumlah_bayar - $total_keseluruhan;
    if ($kembalian < 0) {
        $error = "Jumlah bayar tidak mencukupi. Total: $total_keseluruhan, Bayar: $jumlah_bayar";
        break;
    }

    // Simpan Master (Tabel Nota)
    $stmt_nota = mysqli_prepare($koneksi, "INSERT INTO nota (id_nota, waktu_transaksi, id_pelanggan, id_user, total_keseluruhan, jumlah_bayar, kembalian) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt_nota, "sssiisi", $id_nota, $waktu_transaksi, $id_pelanggan, $id_user, $total_keseluruhan, $jumlah_bayar, $kembalian);
    
    if (!mysqli_stmt_execute($stmt_nota)) {
        $error = "Gagal menyimpan data nota: " . mysqli_error($koneksi);
        break;
    }
    mysqli_stmt_close($stmt_nota);

    // Simpan Detail (Tabel Item_Nota) dan Update Stok
    $stmt_item = mysqli_prepare($koneksi, "INSERT INTO item_nota (id_nota, id_barang, qty, harga_saat_transaksi, subtotal) VALUES (?, ?, ?, ?, ?)");
    $stmt_stok = mysqli_prepare($koneksi, "UPDATE barang SET stok = stok - ? WHERE id = ?");

    foreach ($items_to_insert as $item) {
        // Insert item
        mysqli_stmt_bind_param($stmt_item, "siiis", $id_nota, $item['id_barang'], $item['qty'], $item['harga'], $item['subtotal']);
        if (!mysqli_stmt_execute($stmt_item)) {
            $error = "Gagal menyimpan item nota: " . mysqli_error($koneksi);
            break 2;
        }

        // Update stok
        mysqli_stmt_bind_param($stmt_stok, "ii", $item['qty'], $item['id_barang']);
        if (!mysqli_stmt_execute($stmt_stok)) {
            $error = "Gagal update stok: " . mysqli_error($koneksi);
            break 2;
        }
    }
    mysqli_stmt_close($stmt_item);
    mysqli_stmt_close($stmt_stok);

} while (false);

if ($error !== null) {
    mysqli_rollback($koneksi);
    $_SESSION['message'] = $error;
    $_SESSION['message_type'] = "danger";
    header('Location: form_transaksi.php');
} else {
    mysqli_commit($koneksi);
    $_SESSION['message'] = "Transaksi berhasil disimpan dengan ID: $id_nota";
    $_SESSION['message_type'] = "success";

    header('Location: hasil_nota.php?id=' . $id_nota);
}

exit;
?>