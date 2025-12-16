<?php
// Daftar menu
$menu = [
    1 => ['nama' => 'Nasi Goreng', 'harga' => 15000],
    2 => ['nama' => 'Mie Ayam', 'harga' => 12000],
    3 => ['nama' => 'Es Teh', 'harga' => 5000],
    4 => ['nama' => 'Jus Jeruk', 'harga' => 8000],
];

// Variabel keranjang
$keranjang = [];
$total = 0;

// Input user (simulasi input) 
$inputUser = [
    ['pilihan' => 1, 'jumlah' => 2], // 2 Nasi Goreng
    ['pilihan' => 3, 'jumlah' => 1], // 1 Es Teh
    ['pilihan' => 2, 'jumlah' => 3], // 3 Mie Ayam
    ['pilihan' => 4, 'jumlah' => 1], // 1 Jus Jeruk
]; 

// part perulangan
$i = 0;
while ($i < count($inputUser)) {
    $pilihan = $inputUser[$i]['pilihan'];
    $jumlah  = $inputUser[$i]['jumlah'];

    if (isset($menu[$pilihan])) {
        $item = $menu[$pilihan];
        $subtotal = $item['harga'] * $jumlah;

        $keranjang[] = [
            'nama' => $item['nama'],
            'harga' => $item['harga'],
            'jumlah' => $jumlah,
            'subtotal' => $subtotal
        ];

        $total += $subtotal;
    }
    $i++;
}

//penataan
echo "<pre>";
echo "============================\n";
echo "        STRUK BELANJA       \n";
echo "============================\n";

foreach ($keranjang as $k) {
    echo str_pad($k['nama'], 15) . 
         str_pad("x {$k['jumlah']}", 8) . 
         "Rp" . number_format($k['subtotal']) . "\n";
}

echo "----------------------------\n";
echo "TOTAL BAYAR : Rp" . number_format($total) . "\n";
echo "============================\n";
echo "</pre>";
