<?php
$menu = [
    1 => ["nama" => "Nasi Goreng", "harga" => 10000],
    2 => ["nama" => "Nasi Goreng Special", "harga" => 13000],
    3 => ["nama" => "Ayam Bakar", "harga" => 11000],
    4 => ["nama" => "Ayam Bakar Jumbo", "harga" => 16000]
];

$pilih = $_POST['pilih'];
$jumlah = $_POST['jumlah'];

$nama = $menu[$pilih]['nama'];
$harga = $menu[$pilih]['harga'];
$total = $harga * $jumlah;
?>

<h3>Struk Pembelian</h3>
<p>Menu: <?= $nama ?></p>
<p>Harga Satuan: Rp<?= $harga ?></p>
<p>Jumlah: <?= $jumlah ?></p>
<p><b>Total Bayar: Rp<?= $total ?></b></p>

<form action="tugas-10-akhir.php" method="post">
    <p>Apakah ingin belanja lagi?</p>
    <button type="submit" name="ulang" value="ya">Ya</button>
    <button type="submit" name="ulang" value="tidak">Tidak</button>
</form>
