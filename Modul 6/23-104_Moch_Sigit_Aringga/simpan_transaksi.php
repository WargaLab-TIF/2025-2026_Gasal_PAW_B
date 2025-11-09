<?php
require_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Error: Metode request tidak valid.");
}

$nomor_nota = trim($_POST['nomor_nota'] ?? '');
$tanggal_transaksi = $_POST['tanggal_transaksi'] ?? '';
$items = $_POST['items'] ?? [];

if (empty($nomor_nota) || empty($tanggal_transaksi)) {
    die("Error: Data transaksi tidak lengkap.");
}

if (empty($items)) {
    die("Error: Tidak ada barang yang dipilih.");
}

try {
    $pdo->beginTransaction();
    $total_transaksi = 0;
    $validated_items = [];

    $stmtBarang = $pdo->prepare("SELECT harga_satuan FROM tabel_barang WHERE id_barang = ?");

    foreach ($items as $item) {
        $id_barang = $item['id_barang'] ?? null;
        $jumlah = (int)($item['jumlah'] ?? 0);

        if (!$id_barang || $jumlah <= 0) {
            throw new Exception("Data barang tidak valid.");
        }

        $stmtBarang->execute([$id_barang]);
        $barang = $stmtBarang->fetch(PDO::FETCH_ASSOC);

        if (!$barang) {
            throw new Exception("Barang dengan ID $id_barang tidak ditemukan.");
        }

        $harga = (float)$barang['harga_satuan'];
        $subtotal = $harga * $jumlah;
        $total_transaksi += $subtotal;

        $validated_items[] = [
            'id_barang' => $id_barang,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'subtotal' => $subtotal
        ];
    }

    $stmtMaster = $pdo->prepare("
        INSERT INTO tabel_transaksi (nomor_nota, tanggal_transaksi, total_transaksi)
        VALUES (?, ?, ?)
    ");
    $stmtMaster->execute([$nomor_nota, $tanggal_transaksi, $total_transaksi]);

    $id_transaksi = $pdo->lastInsertId();

    $stmtDetail = $pdo->prepare("
        INSERT INTO tabel_transaksi_detail 
        (id_transaksi, id_barang, jumlah_barang, harga_saat_transaksi, subtotal)
        VALUES (?, ?, ?, ?, ?)
    ");

    foreach ($validated_items as $data) {
        $stmtDetail->execute([
            $id_transaksi,
            $data['id_barang'],
            $data['jumlah'],
            $data['harga'],
            $data['subtotal']
        ]);
    }

    $pdo->commit();

    echo "<h1>Transaksi Berhasil!</h1>";
    echo "<p>Nomor Nota: <b>{$nomor_nota}</b></p>";
    echo "<p>Total Transaksi: <b>Rp " . number_format($total_transaksi, 0, ',', '.') . "</b></p>";
    echo "<p>Data berhasil disimpan ke tabel master & detail.</p>";
    echo '<a href="form_transaksi.php">Buat Transaksi Baru</a>';

} catch (Exception $e) {
    $pdo->rollBack();

    echo "<h1>Transaksi Gagal!</h1>";
    echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p>Semua perubahan telah dibatalkan.</p>";
    echo '<a href="form_transaksi.php">Kembali ke Form</a>';
}
?>