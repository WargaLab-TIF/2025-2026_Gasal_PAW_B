<?php
$menu = [
    1 => ["nama" => "Ayam Geprek", "harga" => 15000],
    2 => ["nama" => "Matcha", "harga" => 12000],
    3 => ["nama" => "Es Teh", "harga" => 5000]
];

$total = 0;

echo "=== Menu Kasir Sederhana ===\n";
foreach ($menu as $key => $item) {
    echo $key . ". " . $item['nama'] . " - Rp" . $item['harga'] . "\n";
}

do {
    $pilihan = (int) readline("Pilih nomor menu: ");
    if (isset($menu[$pilihan])) {
        $jumlah = (int) readline("Jumlah beli: ");
        $subtotal = $menu[$pilihan]['harga'] * $jumlah;
        $total += $subtotal;
        echo "Ditambahkan: " . $menu[$pilihan]['nama'] . " x" . $jumlah . " = Rp" . $subtotal . "\n";
    } else {
        echo "Menu tidak tersedia!\n";
    }

    $lagi = strtolower(readline("Mau beli lagi? (y/n): "));
} while ($lagi == "y");

echo "\nTotal belanja: Rp" . $total . "\n";
echo "Terima kasih sudah berbelanja!\n";
?>
