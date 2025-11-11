<?php
require_once 'koneksi.php';

function tampilTransaksi() {
    global $conn;

    $transaksi = mysqli_query($conn, "
        SELECT t.id, t.waktu_transaksi, t.keterangan, t.total, p.nama AS nama_pelanggan
        FROM transaksi t
        JOIN pelanggan p ON t.pelanggan_id = p.id
        ORDER BY t.id DESC
    ");

    while ($t = mysqli_fetch_assoc($transaksi)) {
        echo "<div style='border:1px solid #000; padding:10px; margin:10px 0;'>";
        echo "<h3>Nota #{$t['id']}</h3>";
        echo "Tanggal: {$t['waktu_transaksi']}<br>";
        echo "Pelanggan: {$t['nama_pelanggan']}<br>";
        echo "Keterangan: {$t['keterangan']}<br>";
        echo "Total: <strong>Rp " . number_format($t['total'], 0, ',', '.') . "</strong><br><br>";

        $detail = mysqli_query($conn, "
            SELECT b.kode_barang, b.nama_barang, d.harga, d.qty
            FROM transaksi_detail d
            JOIN barang b ON d.barang_id = b.id
            WHERE d.transaksi_id = '{$t['id']}'
        ");

        echo "<table border='1' cellpadding='5'>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>";

        $grandTotal = 0;
        while ($d = mysqli_fetch_assoc($detail)) {
            $subtotal = $d['harga'] * $d['qty'];
            $grandTotal += $subtotal;
            echo "<tr>
                    <td>{$d['kode_barang']}</td>
                    <td>{$d['nama_barang']}</td>
                    <td>Rp " . number_format($d['harga'], 0, ',', '.') . "</td>
                    <td>{$d['qty']}</td>
                    <td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
                  </tr>";
        }
        echo "</table>";
        echo "<p><strong>Total Akhir:</strong> Rp " . number_format($grandTotal, 0, ',', '.') . "</p>";
        echo "</div>";
    }
}

