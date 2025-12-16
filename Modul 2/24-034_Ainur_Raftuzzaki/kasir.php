<?php
$menu = array(
    1 => array("nama" => "Nasi Goreng", "harga" => 15000),
    2 => array("nama" => "Mie Ayam", "harga" => 12000),
    3 => array("nama" => "Soto Ayam", "harga" => 13000),
    4 => array("nama" => "Es Teh", "harga" => 5000),
    5 => array("nama" => "Jus Jeruk", "harga" => 7000)
);

$total = 0;
$pesanan = array();
$lanjut = "y";

do {
    echo "==== MENU KASIR ====\n";
    foreach ($menu as $key => $item) {
        echo $key . ". " . $item['nama'] . " - Rp " . number_format($item['harga'], 0, ',', '.') . "\n";
    }

    $pilihan = (int)readline("Pilih nomor menu: ");
    if (isset($menu[$pilihan])) {
        $jumlah = (int)readline("Masukkan jumlah: ");
        if ($jumlah <= 0) {
            echo "Jumlah tidak boleh nol!\n";
            continue;
        }

        $subtotal = $menu[$pilihan]['harga'] * $jumlah;
        $total += $subtotal;

        $pesanan[] = array(
            "nama" => $menu[$pilihan]['nama'],
            "jumlah" => $jumlah,
            "subtotal" => $subtotal
        );

        echo ">> " . $menu[$pilihan]['nama'] . " x $jumlah = Rp " . number_format($subtotal, 0, ',', '.') . "\n";
    } else {
        echo "Pilihan tidak valid!\n";
    }

    $lanjut = strtolower(readline("Apakah mau tambah pesanan lagi? (y/n): "));
} while ($lanjut == "y");

echo "\n=== RINCIAN PESANAN ===\n";
foreach ($pesanan as $item) {
    echo $item['nama'] . " x " . $item['jumlah'] . " = Rp " . number_format($item['subtotal'], 0, ',', '.') . "\n";
}
echo "-----------------------------\n";
echo "TOTAL BAYAR: Rp " . number_format($total, 0, ',', '.') . "\n";

$bayar = (int)readline("Masukkan uang bayar: ");
while ($bayar < $total) {
    echo "Uang kurang! Silakan masukkan jumlah yang cukup.\n";
    $bayar = (int)readline("Masukkan uang bayar: ");
}

$kembali = $bayar - $total;
echo "Kembalian: Rp " . number_format($kembali, 0, ',', '.') . "\n";

echo "\n=== STRUK PEMBAYARAN ===\n";
foreach ($pesanan as $item) {
    echo "- " . $item['nama'] . " x " . $item['jumlah'] . " = Rp " . number_format($item['subtotal'], 0, ',', '.') . "\n";
}
echo "-----------------------------\n";
echo "Total: Rp " . number_format($total, 0, ',', '.') . "\n";
echo "Bayar: Rp " . number_format($bayar, 0, ',', '.') . "\n";
echo "Kembali: Rp " . number_format($kembali, 0, ',', '.') . "\n";
echo "-----------------------------\n";
echo "Terima kasih sudah berbelanja di Warung Sederhana!\n";
?>