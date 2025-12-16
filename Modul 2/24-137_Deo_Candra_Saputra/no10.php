<?php
$menu = array(
    1 => array("nama" => "Nasi Goreng", "harga" => 10000),
    2 => array("nama" => "Mie Ayam", "harga" => 12000),
    3 => array("nama" => "Mie Ayam Bakso", "harga" => 15000),
    4 => array("nama" => "Soto Ayam", "harga" => 10000),
    5 => array("nama" => "Es Teh", "harga" => 6000),
    6 => array("nama" => "Kopi Tubruk", "harga" => 12000),
    7 => array("nama" => "Kopi Luwak", "harga" => 14000),
    8 => array("nama" => "Jus Jeruk", "harga" => 8000),
    9 => array("nama" => "Jus Alpukat", "harga" => 9000)
);

$pesanan = array(
    array("menu" => 9, "jumlah" => 2),
    array("menu" => 8, "jumlah" => 1),
    array("menu" => 5, "jumlah" => 2),
    array("menu" => 2, "jumlah" => 1),
    array("menu" => 3, "jumlah" => 2)
);

$total = 0;

echo "<h2>==== MENU KASIR ====<br></h2>";

foreach ($menu as $key => $item) {
    echo $key . ". " . $item['nama'] . " - Rp " . $item['harga'] . "<br>";
}

echo "<h3>Daftar Pesanan:</h3>";

foreach ($pesanan as $p) {
    $pilihan = $p['menu'];
    $jumlah = $p['jumlah'];

    if (isset($menu[$pilihan])) {
        $subtotal = $menu[$pilihan]['harga'] * $jumlah;
        $total += $subtotal;
        echo $menu[$pilihan]['nama'] . " x " . $jumlah . " = Rp " . $subtotal . "<br>";
    } else {
        echo "Menu nomor " . $pilihan . " tidak valid!<br>";
    }
}

echo "<br>";
echo "<b>TOTAL BAYAR: Rp " . $total . "</b><br>";
echo "Terima kasih sudah belanja!<br>";
?>
