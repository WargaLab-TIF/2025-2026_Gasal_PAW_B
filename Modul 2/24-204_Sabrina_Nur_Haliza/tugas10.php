<?php
$menu = [ // untuk menyimpan daftar menu dan harga
    "Nasi Goreng" => 15000,
    "Mie Ayam"    => 12000,
    "Es Teh"      => 5000
];

$pembelian = [ // untuk menyimpan daftar item yang dibeli dan jumlahnya
    "Nasi Goreng" => 2, 
    "Es Teh"      => 1  
];

$total = 0; // untuk menyimpan total harga keseluruhan
foreach ($pembelian as $item => $jumlah) { // untuk menghitung setiap item yang dibeli
    $subtotal = $menu[$item] * $jumlah; // untuk menghitung harga per item
    echo "$item ($jumlah x Rp{$menu[$item]}) = Rp$subtotal<br>"; // untuk menampilkan rincian harga
    $total += $subtotal; // untuk menambah subtotal ke total
}

echo "<br>";
echo "Total yang harus dibayar: <b>Rp$total</b>"; // untuk menampilkan total akhir
?>
