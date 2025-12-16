<?php

echo "==== PROGRAM KASIR SEDERHANA ====<br><br>";
$menu = [
    1 => ["Nasi Goreng", 15000],
    2 => ["Mie Ayam", 12000],
    3 => ["Es Teh", 5000],
    4 => ["Es Jeruk", 7000]
];

echo "=== MENU MAKANAN & MINUMAN ===<br>";
foreach ($menu as $key => $item) {
    echo "$key. " . $item[0] . " - Rp" . $item[1] . "<br>";
}
echo "==============================<br><br>";

$total = 0;
$pembelian = [1, 2, 4];
for ($i = 0; $i < count($pembelian); $i++) {
    $pilihan = $pembelian[$i];

    if (isset($menu[$pilihan])) {
        echo "Anda membeli: " . $menu[$pilihan][0] .
            " (Rp" . $menu[$pilihan][1] . ")<br>";
        $total += $menu[$pilihan][1];
    } else {
        echo "Pilihan menu tidak tersedia<br>";
    }
}

echo "<br><b>Total yang harus dibayar: Rp" . $total . "</b><br>";
echo "===== TERIMA KASIH =====";
