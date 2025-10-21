<?php
$menu = array(
    1 => array("nama" => "Buku", "harga" => 10000),
    2 => array("nama" => "Pensil", "harga" => 12000),
    3 => array("nama" => "Stipo", "harga" => 15000),
    4 => array("nama" => "Pulpen", "harga" => 10000),
    5 => array("nama" => "Penghapus", "harga" => 6000)
);

$pesanan = array(
    array("menu" => 1, "jumlah" => 2),
    array("menu" => 3, "jumlah" => 2),
    array("menu" => 2, "jumlah" => 1)
);

$total = 0;

echo "<h2>==== MENU KASIR ====<br></h2>";

foreach ($menu as $key => $item) {
    echo $key . ". " . $item['nama'] . " - Rp " . $item['harga'] . "<br>";
}

echo "<h3>Daftar Pesanan:</h3>";

foreach ($pesanan as $data) {
    $pilihan = $data['menu'];
    $jumlah = $data['jumlah'];

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