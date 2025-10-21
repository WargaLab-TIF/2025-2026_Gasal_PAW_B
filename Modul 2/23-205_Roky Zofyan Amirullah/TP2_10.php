<?php
$menu = [
    1 => ["nama" => "Nasi Goreng", "harga" => 15000],
    2 => ["nama" => "Mie Ayam", "harga" => 12000],
    3 => ["nama" => "Soto Ayam", "harga" => 10000],
    4 => ["nama" => "Es Teh", "harga" => 5000],
    5 => ["nama" => "Jus Jeruk", "harga" => 8000],
];


$pilihan_menu = [2, 3, 5];   
$jumlah_beli  = [1, 1, 1];   

$total = 0;

echo "=== MENU KASIR ===\n <br>";
foreach ($menu as $key => $item) {
    echo "$key. {$item['nama']} - Rp {$item['harga']}\n <br>";
}
echo "=====================\n <br>";

for ($i = 0; $i < count($pilihan_menu); $i++) {
    $id = $pilihan_menu[$i];
    $jml = $jumlah_beli[$i];

    if (isset($menu[$id])) {
        $nama = $menu[$id]['nama'];
        $harga = $menu[$id]['harga'];
        $subtotal = $harga * $jml;
        $total += $subtotal;

        echo "Beli $nama x $jml = Rp $subtotal\n <br>";
    } else {
        echo "Menu nomor $id tidak tersedia!\n <br>";
    }
}

echo "=====================\n <br>";
echo "Total Bayar = Rp $total\n";
?>
