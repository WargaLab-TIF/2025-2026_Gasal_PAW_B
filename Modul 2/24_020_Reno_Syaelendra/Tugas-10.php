<?php
$progam_sistem_kasir = "Sistem Kasir Sederhana";
echo "<h1>$progam_sistem_kasir</h1>";

// Menu yang dibeli
$menu = [
    "Nasi Goreng" => 15000,
    "Mie Ayam" => 12000,
    "Ayam Bakar" => 25000,
    "Es Teh" => 5000,
    "Es Jeruk" => 6000
];

$pilihan_menu = ["Nasi Goreng", "Ayam Bakar", "Es Teh"];

// Total harga
$total_harga = 0;

echo "<h2>Detail Pembelian:</h2>";
echo "<ul>";

// Perulangan 
foreach ($pilihan_menu as $item) {
    if (array_key_exists($item, $menu)) {
        $harga = $menu[$item];
        $total_harga += $harga;
        echo "<li>" . $item . " - Rp " . number_format($harga) . "</li>";
    }
}

echo "</ul>";
echo "<h3>Total Harga: Rp " . number_format($total_harga) . "</h3>";
?>