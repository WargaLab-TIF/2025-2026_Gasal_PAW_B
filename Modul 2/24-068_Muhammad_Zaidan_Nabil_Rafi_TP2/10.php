<?php
$menu = array(
    1 => array("nama" => "Nasi Goreng", "harga" => 15000),
    2 => array("nama" => "Mie Ayam", "harga" => 12000),
    3 => array("nama" => "Soto Ayam", "harga" => 13000),
    4 => array("nama" => "Es Teh", "harga" => 5000),
    5 => array("nama" => "Jus Jeruk", "harga" => 7000)
);

$total = 0;
$lanjut = "y";

do {
    echo "==== MENU KASIR ====\n";
    foreach ($menu as $key => $item) {
        echo $key . ". " . $item['nama'] . " - Rp " . $item['harga'] . "\n";
    }

    $pilihan = (int)readline("Pilih nomor menu: ");

    if (isset($menu[$pilihan])) {
        $jumlah = (int)readline("Masukkan jumlah: ");
        $subtotal = $menu[$pilihan]['harga'] * $jumlah;
        $total += $subtotal;

        echo ">> " . $menu[$pilihan]['nama'] . " x $jumlah = Rp $subtotal\n";
    } else {
        echo "Pilihan tidak valid!\n";
    }

    $lanjut = strtolower(readline("Apakah mau tambah pesanan lagi? (y/n): "));

} while ($lanjut == "y");

echo "============================\n";
echo "TOTAL BAYAR: Rp $total\n";
echo "Terima kasih sudah belanja!\n";
?>
