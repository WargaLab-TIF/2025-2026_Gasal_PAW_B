<?php
require 'koneksi.php';
// Styling untuk pesan
echo "<style>
    body { font-family: sans-serif; margin: 20px; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); max-width: 600px; margin: 40px auto; }
    h1 { color: #333; }
    a { display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 4px; }
    a:hover { background-color: #0056b3; }
    .error { border: 2px solid #dc3545; background: #f8d7da; color: #721c24; padding: 15px; }
    .success { border: 2px solid #28a745; background: #d4edda; color: #155724; padding: 15px; }
</style>";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("<div class='error'><h1>Koneksi Gagal!</h1><p>" . $conn->connect_error . "</p></div>");
}

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// 2. Mulai Database Transaction
$conn->begin_transaction();

try {
    // 3. Ambil dan Simpan Data Master
    $no_nota = $_POST['no_nota'];
    $tanggal = $_POST['tanggal'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $total_keseluruhan = $_POST['total_keseluruhan'];

    $stmt_master = $conn->prepare("INSERT INTO transaksi_master (no_nota, tanggal, nama_pelanggan, total_keseluruhan) VALUES (?, ?, ?, ?)");
    $stmt_master->bind_param("sssd", $no_nota, $tanggal, $nama_pelanggan, $total_keseluruhan);
    $stmt_master->execute();

    // 4. Ambil ID dari Master
    $master_id = $conn->insert_id;
    $stmt_master->close();

    // 5. Ambil dan Simpan Data Detail (Looping)
    $barang_id_arr = $_POST['barang_id']; 
    $jumlah_arr = $_POST['jumlah'];
    $subtotal_arr = $_POST['subtotal'];

    $stmt_detail = $conn->prepare("INSERT INTO transaksi_detail (master_id, barang_id, jumlah, subtotal) VALUES (?, ?, ?, ?)");
    $stmt_stok = $conn->prepare("UPDATE master_barang SET stok = stok - ? WHERE id = ?");
    
    for ($i = 0; $i < count($barang_id_arr); $i++) {
        $barang_id = $barang_id_arr[$i];
        $jumlah = $jumlah_arr[$i];
        $subtotal = $subtotal_arr[$i];

        // a. Simpan ke detail
        $stmt_detail->bind_param("iiid", $master_id, $barang_id, $jumlah, $subtotal);
        $stmt_detail->execute();
        
        // b. Update stok barang
        $stmt_stok->bind_param("ii", $jumlah, $barang_id);
        $stmt_stok->execute();
    }
    
    $stmt_detail->close();
    $stmt_stok->close();

    // 6. Jika semua berhasil, commit
    $conn->commit();
    
    echo "<div class='success'><h1>Transaksi Berhasil!</h1>";
    echo "<p>No. Nota: <strong>$no_nota</strong> telah berhasil disimpan.</p>";
    echo "<p>Stok barang telah diperbarui.</p>";
    echo "<a href='form_transaksi.php'>Kembali ke Form</a></div>";

} catch (mysqli_sql_exception $exception) {
    // 7. Jika gagal, rollback
    $conn->rollback();
    
    echo "<div class='error'><h1>Transaksi Gagal!</h1>";
    echo "<p>Error: " . $exception->getMessage() . "</p>";
    echo "<p>Semua data telah dibatalkan (rollback).</p>";
    echo "<a href='form_transaksi.php'>Kembali ke Form</a></div>";

} finally {
    // 8. Tutup koneksi
    $conn->close();
}
?>