<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_nota = $_POST['no_nota'] ?? '';
    $tanggal = $_POST['tanggal'] ?? '';
    $barang  = $_POST['barang'] ?? [];
    $qty     = $_POST['qty'] ?? [];
    $harga   = $_POST['harga'] ?? [];

    $total = 0;
    $items = [];
    foreach ($barang as $i => $b) {
        if (trim($b) === '') continue;
        $q = (int)$qty[$i];
        $h = (float)$harga[$i];
        $sub = $q * $h;
        $total += $sub;
        $items[] = ['barang'=>$b,'qty'=>$q,'harga'=>$h,'subtotal'=>$sub];
    }

    $no = mysqli_real_escape_string($koneksi, $no_nota);
    $tgl = mysqli_real_escape_string($koneksi, $tanggal);
    mysqli_query($koneksi, "INSERT INTO nota (no_nota,tanggal,total) VALUES ('$no','$tgl',$total)");
    $nota_id = mysqli_insert_id($koneksi);

    foreach ($items as $it) {
        $brg = mysqli_real_escape_string($koneksi, $it['barang']);
        $q   = (int)$it['qty'];
        $h   = (float)$it['harga'];
        $sub = $it['subtotal'];
        mysqli_query($koneksi, "INSERT INTO nota_detail (nota_id,barang,qty,harga,subtotal) VALUES ($nota_id,'$brg',$q,$h,$sub)");
        mysqli_query($koneksi, "UPDATE barang SET stok = stok - $q WHERE nama_barang = '$brg' AND stok >= $q");
        if (mysqli_affected_rows($koneksi) === 0) {
            echo "<p>Stok tidak cukup untuk barang: " . htmlspecialchars($brg) . "</p>";
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Nota #<?php echo htmlspecialchars($no_nota); ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="p-4">
        <div class="container">
            <h1 class="h4 mb-3">Nota Transaksi</h1>
            <p class="mb-1">No: <strong><?php echo htmlspecialchars($no_nota); ?></strong></p>
            <p class="mb-1">Tanggal: <strong><?php echo htmlspecialchars($tanggal); ?></strong></p>
            <p class="mb-3">ID Nota: <strong><?php echo (int)$nota_id; ?></strong></p>
            <table class="table table-sm table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Barang</th><th class="text-end">Qty</th><th class="text-end">Harga</th><th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($items as $it): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($it['barang']); ?></td>
                        <td class="text-end"><?php echo $it['qty']; ?></td>
                        <td class="text-end"><?php echo number_format($it['harga'],2); ?></td>
                        <td class="text-end"><?php echo number_format($it['subtotal'],2); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th class="text-end"><?php echo number_format($total,2); ?></th>
                    </tr>
                </tfoot>
            </table>
            <div class="mt-3 d-print-none">
                <a href="form_transaksi.php" class="btn btn-primary btn-sm">Transaksi Baru</a>
                <button onclick="window.print()" class="btn btn-outline-secondary btn-sm">Print</button>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}
?>