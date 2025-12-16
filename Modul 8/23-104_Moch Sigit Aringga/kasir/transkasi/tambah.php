<?php 
include 'config.php';
include '../header.php';
include '../../auth.php';

if (isset($_POST['submit'])) {
    mysqli_query($conn, "INSERT INTO transaksi (waktu_transaksi, keterangan, pelanggan_id, total)
                         VALUES (NOW(), '$_POST[keterangan]', '$_POST[pelanggan_id]', 0)");

    $id = mysqli_insert_id($conn);

    header("Location: detail.php?id=$id");
}
?>

<h3>Tambah Transaksi</h3>

<form method="POST">
    <label>Pelanggan</label>
    <select name="pelanggan_id" class="form-control" required>
        <option value="">-- Pilih Pelanggan --</option>
        <?php 
        $p = mysqli_query($conn, "SELECT * FROM pelanggan");
        while ($row = mysqli_fetch_assoc($p)) {
            echo "<option value='$row[id]'>$row[nama]</option>";
        }
        ?>
    </select>

    <label class="mt-3">Keterangan</label>
    <textarea name="keterangan" class="form-control"></textarea>

    <button type="submit" name="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
