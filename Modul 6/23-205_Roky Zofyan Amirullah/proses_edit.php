<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    mysqli_begin_transaction($conn);
    $total_keseluruhan = 0;

    try {
        $id_nota = $_POST['id_nota'];
        $no_nota = $_POST['no_nota'];
        $tanggal = $_POST['tanggal'];
        $nama_pelanggan = $_POST['nama_pelanggan'];
        
        $sql_master = "UPDATE nota SET no_nota = ?, tanggal = ?, nama_pelanggan = ? WHERE id_nota = ?";
        $stmt_master = mysqli_prepare($conn, $sql_master);
        mysqli_stmt_bind_param($stmt_master, "sssi", $no_nota, $tanggal, $nama_pelanggan, $id_nota);
        if (!mysqli_stmt_execute($stmt_master)) { throw new Exception("Gagal update data master."); }
        
        if (isset($_POST['hapus_detail'])) {
            $sql_hapus = "DELETE FROM detail_barang WHERE id_detail = ?";
            $stmt_hapus = mysqli_prepare($conn, $sql_hapus);
            foreach ($_POST['hapus_detail'] as $id_detail_hapus) {
                mysqli_stmt_bind_param($stmt_hapus, "i", $id_detail_hapus);
                if (!mysqli_stmt_execute($stmt_hapus)) { throw new Exception("Gagal menghapus detail."); }
            }
        }
        
        if (isset($_POST['id_detail_existing'])) {
            $sql_update_detail = "UPDATE detail_barang SET nama_barang = ?, jumlah = ?, harga_satuan = ?, subtotal = ? 
                                  WHERE id_detail = ?";
            $stmt_update_detail = mysqli_prepare($conn, $sql_update_detail);
            
            for ($i = 0; $i < count($_POST['id_detail_existing']); $i++) {
                $id_detail = $_POST['id_detail_existing'][$i];
                
                if (isset($_POST['hapus_detail']) && in_array($id_detail, $_POST['hapus_detail'])) {
                    continue; 
                }
                
                $nama = $_POST['barang_nama_existing'][$i];
                $jumlah = (int)$_POST['barang_jumlah_existing'][$i];
                $harga = (int)$_POST['barang_harga_existing'][$i];
                $subtotal = $jumlah * $harga;
                $total_keseluruhan += $subtotal;
                
                mysqli_stmt_bind_param($stmt_update_detail, "siiii", $nama, $jumlah, $harga, $subtotal, $id_detail);
                if (!mysqli_stmt_execute($stmt_update_detail)) { throw new Exception("Gagal update detail existing."); }
            }
        }
        
        if (isset($_POST['barang_nama_baru'])) {
            $sql_insert_detail = "INSERT INTO detail_barang (id_nota, nama_barang, jumlah, harga_satuan, subtotal) 
                                  VALUES (?, ?, ?, ?, ?)";
            $stmt_insert_detail = mysqli_prepare($conn, $sql_insert_detail);
            
            for ($i = 0; $i < count($_POST['barang_nama_baru']); $i++) {
                $nama = $_POST['barang_nama_baru'][$i];
                $jumlah = (int)$_POST['barang_jumlah_baru'][$i];
                $harga = (int)$_POST['barang_harga_baru'][$i];
                $subtotal = $jumlah * $harga;
                $total_keseluruhan += $subtotal;
                
                mysqli_stmt_bind_param($stmt_insert_detail, "isiii", $id_nota, $nama, $jumlah, $harga, $subtotal);
                if (!mysqli_stmt_execute($stmt_insert_detail)) { throw new Exception("Gagal insert detail baru."); }
            }
        }
        
        $sql_update_total = "UPDATE nota SET total_keseluruhan = ? WHERE id_nota = ?";
        $stmt_update_total = mysqli_prepare($conn, $sql_update_total);
        mysqli_stmt_bind_param($stmt_update_total, "ii", $total_keseluruhan, $id_nota);
        if (!mysqli_stmt_execute($stmt_update_total)) { throw new Exception("Gagal update final total."); }

        mysqli_commit($conn);
        echo "Data transaksi berhasil di-update!";
        header("Location: index.php");

    } catch (Exception $e) {
        mysqli_rollback($conn);
        echo "Gagal meng-update transaksi: " . $e->getMessage();
    }
    
    mysqli_close($conn);

} else {
    header("Location: index.php");
}
?>