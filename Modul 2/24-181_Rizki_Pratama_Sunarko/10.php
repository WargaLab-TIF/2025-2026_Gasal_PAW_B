<?php
// Kembangkan progam sistem kasir sederhana dengan menu, perulangan, dan total harga! (clue: ada input menu yang dibeli, dan ulang lagi jika ada item menu yang lain).
// Input pesanan (manual pakai variabel, bukan array)
$pilihan1 = 1; $jumlah1 = 2; // Nasi Goreng 2 porsi
$pilihan2 = 4; $jumlah2 = 3; // Es Teh 3 gelas
$pilihan3 = 5; $jumlah3 = 1; // Es Jeruk 1 gelas

$total = 0;
$output = "";

// Ada 3 pesanan
for ($i = 1; $i <= 3; $i++) {
    $pilihan = ${"pilihan".$i};
    $jumlah  = ${"jumlah".$i};

    // Cek menu berdasarkan pilihan
    if ($pilihan == 1) {
        $nama = "Nasi Goreng";
        $harga = 15000;
    } elseif ($pilihan == 2) {
        $nama = "Mie Ayam";
        $harga = 12000;
    } elseif ($pilihan == 3) {
        $nama = "Sate Ayam";
        $harga = 20000;
    } elseif ($pilihan == 4) {
        $nama = "Es Teh";
        $harga = 5000;
    } elseif ($pilihan == 5) {
        $nama = "Es Jeruk";
        $harga = 7000;
    } else {
        $nama = "Menu tidak valid";
        $harga = 0;
    }

    $subtotal = $harga * $jumlah;
    $total += $subtotal;
    $output .= "$nama x $jumlah = Rp $subtotal<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kasir Sederhana</title>
</head>
<body>
    <h2>Menu:</h2>
    <ul>
        <li>1. Nasi Goreng - Rp 15.000</li>
        <li>2. Mie Ayam - Rp 12.000</li>
        <li>3. Sate Ayam - Rp 20.000</li>
        <li>4. Es Teh - Rp 5.000</li>
        <li>5. Es Jeruk - Rp 7.000</li>
    </ul>
    <h3>Pesanan:</h3>
    <?php echo $output; ?>
    <h3>Total Harga: Rp <?php echo $total; ?></h3>
</body>
</html>

