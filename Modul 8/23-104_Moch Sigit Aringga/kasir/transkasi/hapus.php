<?php 
include 'config.php';
include '../../auth.php';

$id = $_GET['id']; 

$t = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM transaksi WHERE id=$id"));
?>

<h3>Detail Transaksi #<?= $id ?></h3>

<b>Pelanggan:</b> 
<?php
$p = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM pelanggan WHERE id=$t[pelanggan_id]"));
echo $p['nama'];
?>

<br><b>Keterangan:</b> <?= $t['keterangan'] ?>
<br><b>Total:</b> Rp <?= number_format($t['total']) ?>

<hr>
<h4>Tambah Barang</h4>

<form method="POST">
    <select name="barang_id" class="form-control mb-2">
        <?php 
        $b = mysqli_query($conn, "SELECT * FROM barang");
        while ($row = mysqli_fetch_assoc($b)) {
            echo "<option value='$row[id]'>$row[nama] - Rp ".number_format($row['harga'])."</option>";
        }
        ?>
    </select>

    <input type="number" name="qty" class="form-control" placeholder="Qty" required>

    <button type="submit" name="add" class="btn btn-success mt-2">Tambah</button>
</form>

<?php
if (isset($_POST['add'])) {
    $barang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM barang WHERE id=$_POST[barang_id]"));
    $harga = $barang['harga'];
    $qty = $_POST['qty'];

    mysqli_query($conn, "INSERT INTO detail_transaksi (transaksi_id, barang_id, harga, qty)
                         VALUES ($id, $_POST[barang_id], $harga, $qty)");

    mysqli_query($conn, "UPDATE transaksi 
                         SET total = total + ($harga * $qty)
                         WHERE id=$id");

    header("Refresh:0");
}
?>

<hr>
<h4>Daftar Barang</h4>

<table class="table table-bordered">
    <tr>
        <th>Barang</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Subtotal</th>
    </tr>

    <?php
    $d = mysqli_query($conn, "SELECT dt.*, b.nama 
                              FROM detail_transaksi dt
                              JOIN barang b ON b.id = dt.barang_id
                              WHERE transaksi_id=$id");

    while ($row = mysqli_fetch_assoc($d)) {
        $sub = $row['harga'] * $row['qty'];
    ?>
    <tr>
        <td><?= $row['nama'] ?></td>
        <td><?= number_format($row['harga']) ?></td>
        <td><?= $row['qty'] ?></td>
        <td><?= number_format($sub) ?></td>
    </tr>
    <?php } ?>
</table>
