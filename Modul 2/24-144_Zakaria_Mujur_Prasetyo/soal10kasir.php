<?php
// Menu
$menu = [
    '1' => ['nama' => 'Apel',        'harga' => 5000],
    '2' => ['nama' => 'Nasi Pecel',  'harga' => 10000],
    '3' => ['nama' => 'Nasi Geprek', 'harga' => 15000],
    '4' => ['nama' => 'Nasi Campur', 'harga' => 20000],
    '5' => ['nama' => 'Nasi Rames',  'harga' => 25000],
];

// Fungsi Pilih Menu
function pilihMenu($menu, $kode) {
    if ($kode === '1') return $menu['1'];
    if ($kode === '2') return $menu['2'];
    if ($kode === '3') return $menu['3'];
    if ($kode === '4') return $menu['4'];
    if ($kode === '5') return $menu['5'];
    return null;
}

// Daftar Menu
echo "<h3>Daftar Menu</h3>";
foreach ($menu as $k => $m) {
    echo $k . ". " . $m['nama'] . " = Rp " . $m['harga'] . "<br>";
}

// Input
$inputs = [
    ['kode' => '1', 'qty' => 2],
    ['kode' => '3', 'qty' => 1],
    ['kode' => '5', 'qty' => 3],
];

// Proses
$total = 0;
$riwayat = "";

foreach ($inputs as $in) {
    $kode = $in['kode'];
    $qty = (int)$in['qty'];
    if ($qty < 1) $qty = 1;

$item = pilihMenu($menu, $kode);
    if ($item !== null) {
        $sub = $item['harga'] * $qty;
        $total = $total + $sub;
        $riwayat = $riwayat . $item['nama'] . " x " . $qty . " = Rp " . $sub . "<br>";
    } else {
        $riwayat = $riwayat . "Kode " . $kode . " tidak valid<br>";
    }
}

// Output
echo "<h3>Pesanan</h3>";
if ($riwayat === "") { echo "Belum ada pesanan.<br>";
} else { echo $riwayat; }
echo "<strong>Total: Rp " . $total . "</strong>";