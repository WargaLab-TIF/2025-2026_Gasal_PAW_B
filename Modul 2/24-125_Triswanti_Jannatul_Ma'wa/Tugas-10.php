<?php
$menu = [
    "Nasi Goreng" => 15000,
    "Mi Ayam" => 12000,
    "Es Teh" => 5000,
    "Jus Alpukat" => 10000
];

$pesanan = ["Nasi Goreng", "Mi Ayam", "Jus Alpukat"];

$total = 0;

foreach ($pesanan as $item) {
    if (isset($menu[$item])) {
        echo "$item - Rp {$menu[$item]}<br>";
        $total += $menu[$item];
    } else {
        echo "$item tidak tersedia di menu.<br>";
    }
}

echo "<strong>Total yang harus dibayar: Rp $total</strong>";
?>
