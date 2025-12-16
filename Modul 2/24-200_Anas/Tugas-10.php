<?php


$totalHarga = 0;

echo "===== Sistem Kasir Sederhana =====<br>";
echo "Menu Makanan:<br>";
echo "1. Nasi Goreng (Rp 15.000)<br>";
echo "2. Mie Ayam (Rp 12.000)<br>";
echo "3. Soto Ayam (Rp 18.000)<br>";
echo "4. Es Teh (Rp 5.000)<br>";
echo "==================================<br>";

$pilihan = 3;
$jumlah = 2;

$hargaItem = 0;
if ($pilihan == 1) {
    $hargaItem = 15000 * $jumlah;
} elseif ($pilihan == 2) {
    $hargaItem = 12000 * $jumlah;
} elseif ($pilihan == 3) {
    $hargaItem = 18000 * $jumlah;
} elseif ($pilihan == 4) {
    $hargaItem = 5000 * $jumlah;
} else {
    echo "Pilihan menu tidak valid, tidak ada item yang ditambahkan.<br>";
    $hargaItem = 0;
}

$totalHarga += $hargaItem;

echo "Total harga sementara: Rp " . $totalHarga . "<br>";



echo "==================================<br>";
echo "Total Harga Akhir: Rp " . $totalHarga . "<br>";
echo "Terima kasih telah berbelanja!<br>";

?>