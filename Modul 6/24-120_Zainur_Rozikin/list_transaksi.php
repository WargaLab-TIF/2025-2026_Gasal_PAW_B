<?php
include 'koneksi.php';

$query = mysqli_query($conn, "SELECT t.*, p.nama AS nama_pelanggan
                              FROM penjualan_transaksi t
                              JOIN penjualan_pelanggan p ON t.pelanggan_id = p.id
                              ORDER BY t.id DESC");
?>

<table class="table table-striped table-bordered mt-3">
    <thead class="table-dark text-center">
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Keterangan</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($t = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $t['id']; ?></td>
            <td><?= $t['waktu_transaksi']; ?></td>
            <td><?= $t['nama_pelanggan']; ?></td>
            <td><?= $t['keterangan']; ?></td>
            <td>Rp <?= number_format($t['total']); ?></td>
        </tr>
        <?php
        $detail = mysqli_query($conn, "SELECT d.*, b.nama_barang 
                                       FROM penjualan_transaksi_detail d
                                       JOIN penjualan_barang b ON d.barang_id = b.id
                                       WHERE d.transaksi_id = '{$t['id']}'");
        ?>
        <tr>
            <td colspan="5">
                <strong>Detail Barang:</strong>
                <ul>
                    <?php while ($d = mysqli_fetch_assoc($detail)) { ?>
                        <li><?= $d['nama_barang']; ?> - <?= $d['qty']; ?> x Rp <?= number_format($d['harga']); ?></li>
                    <?php } ?>
                </ul>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
