<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tanggal_nota = $_POST['tanggal_nota'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    
    $nama_barang = $_POST['nama_barang'];
    $harga_satuan = $_POST['harga_satuan'];
    $jumlah = $_POST['jumlah'];

    $total_bayar = 0;
    $items_detail = [];

    $jumlah_baris = count($nama_barang);
    for ($i = 0; $i < $jumlah_baris; $i++) {
        $jml = (int)$jumlah[$i];

        if ($jml > 0 && !empty($nama_barang[$i])) {
            $hs = (float)$harga_satuan[$i];
            $sub = $hs * $jml;
            
            $items_detail[] = [
                'nama' => $nama_barang[$i],
                'harga' => $hs,
                'jumlah' => $jml,
                'subtotal' => $sub
            ];
            $total_bayar += $sub;
        }
    }

    if (empty($items_detail)) {
        die("<h2>Transaksi GAGAL</h2><p>Tidak ada barang valid yang diinput.</p><p><a href='index.php'>Kembali</a></p>");
    }

    $conn->begin_transaction();
    $berhasil = true; 
    $pesan_error = "";

    $stmt_master = $conn->prepare("INSERT INTO transaksi_master (tanggal_nota, nama_pelanggan, total_bayar) VALUES (?, ?, ?)");
    $stmt_master->bind_param("ssd", $tanggal_nota, $nama_pelanggan, $total_bayar); 

    if (!$stmt_master->execute()) {
        $berhasil = false;
        $pesan_error = "Gagal simpan Master: " . $stmt_master->error;
    }
    
    if ($berhasil) {
        $id_nota_baru = $conn->insert_id;
        $stmt_master->close();

        $stmt_detail = $conn->prepare("INSERT INTO transaksi_detail (id_nota, nama_barang, harga_satuan, jumlah, subtotal) VALUES (?, ?, ?, ?, ?)");
        $stmt_detail->bind_param("isidd", $id_nota_baru, $nb, $hs, $jml, $sub); 

        foreach ($items_detail as $item) {
            $nb = $item['nama'];
            $hs = $item['harga'];
            $jml = $item['jumlah'];
            $sub = $item['subtotal'];

            if (!$stmt_detail->execute()) {
                $berhasil = false;
                $pesan_error = "Gagal simpan Detail untuk barang: " . $nb . " - " . $stmt_detail->error;
                break;
            }
        }
        $stmt_detail->close();
    }

    if ($berhasil) {
        $conn->commit();
        echo "<h2>Transaksi Berhasil Disimpan!</h2>";
        echo "<p>ID Nota Baru: " . $id_nota_baru . "</p>";
        echo "<p>Total Bayar: Rp. " . $total_bayar . "</p>";
        echo "<p><a href='index.php'>Kembali ke Form</a></p>";
    } else {
        $conn->rollback();
        echo "<h2>Transaksi GAGAL</h2>";
        echo "<p>Pesan Error: " . $pesan_error . "</p>";
        echo "<p>Data Master dan Detail telah dibatalkan (Rollback).</p>";
        echo "<p><a href='index.php'>Kembali ke Form</a></p>";
    }

    $conn->close();

} else {
    echo "Akses tidak sah.";
}
?>