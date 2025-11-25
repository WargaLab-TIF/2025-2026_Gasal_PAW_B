<?php 
include 'config.php';
include '../header.php';
include '../../auth.php';

$id = $_GET['id'];
$t = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM transaksi WHERE id=$id"));

if (isset($_POST['submit'])) {
    mysqli_query($conn, "UPDATE transaksi SET 
        pelanggan_id='$_POST[pelanggan_id]',
        keterangan='$_POST[keterangan]'
        WHERE id=$id");

    header("Location: index.php");
    exit;
}

// ambil data pelanggan
$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
?>

<h3>Edit Transaksi</h3>

<form method="POST">

    <label>Pelanggan</label>
    <select name="pelanggan_id" class="form-control" required>
        <?php while ($p = mysqli_fetch_assoc($pelanggan)) { ?>
            <option value="<?= $p['id'] ?>" <?= $p['id']==$t['pelanggan_id']?'selected':'' ?>>
                <?= $p['nama'] ?>
            </option>
        <?php } ?>
    </select>

    <label class="mt-3">Keterangan</label>
    <textarea name="keterangan" class="form-control"><?= $t['keterangan'] ?></textarea>

    <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
</form>
