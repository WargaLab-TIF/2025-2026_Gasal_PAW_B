<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $no_nota = $_POST['no_nota'];
    $tanggal = $_POST['tanggal'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    
    $barang_nama = $_POST['barang_nama'];
    $barang_jumlah = $_POST['barang_jumlah'];
    $barang_harga = $_POST['barang_harga'];
    
    $total_keseluruhan = 0;
    
    mysqli_begin_transaction($conn);
    
    try {
        $sql_master = "INSERT INTO nota (no_nota, tanggal, nama_pelanggan) 
                       VALUES (?, ?, ?)";
        $stmt_master = mysqli_prepare($conn, $sql_master);
        mysqli_stmt_bind_param($stmt_master, "sss", $no_nota, $tanggal, $nama_pelanggan);
        
        if (!mysqli_stmt_execute($stmt_master)) {
            throw new Exception("Gagal menyimpan data master: " . mysqli_error($conn));
        }
        
        $id_nota_baru = mysqli_insert_id($conn);
        
        $sql_detail = "INSERT INTO detail_barang (id_nota, nama_barang, jumlah, harga_satuan, subtotal) 
                       VALUES (?, ?, ?, ?, ?)";
        $stmt_detail = mysqli_prepare($conn, $sql_detail);
        
        for ($i = 0; $i < count($barang_nama); $i++) {
            $nama = $barang_nama[$i];
            $jumlah = (int)$barang_jumlah[$i];
            $harga = (int)$barang_harga[$i];
            $subtotal = $jumlah * $harga;
            
            $total_keseluruhan += $subtotal;
            
            mysqli_stmt_bind_param($stmt_detail, "isiii", $id_nota_baru, $nama, $jumlah, $harga, $subtotal);
            if (!mysqli_stmt_execute($stmt_detail)) {
                throw new Exception("Gagal menyimpan data detail barang: " . mysqli_error($conn));
            }
        }
        
        $sql_update_total = "UPDATE nota SET total_keseluruhan = ? WHERE id_nota = ?";
        $stmt_update_total = mysqli_prepare($conn, $sql_update_total);
        mysqli_stmt_bind_param($stmt_update_total, "ii", $total_keseluruhan, $id_nota_baru);
        
        if (!mysqli_stmt_execute($stmt_update_total)) {
            throw new Exception("Gagal mengupdate total di nota: " . mysqli_error($conn));
        }

        mysqli_commit($conn);
        echo "Data transaksi berhasil disimpan!";
        header("Location: index.php");

    } catch (Exception $e) {
        mysqli_rollback($conn);
        echo "Gagal menyimpan transaksi: " . $e->getMessage();
    }
    
    mysqli_close($conn);

} else {
    header("Location: form_tambah.php");
}
?>