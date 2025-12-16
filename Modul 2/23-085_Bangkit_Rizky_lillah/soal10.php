<?php

$menu = [
    "Makanan" => [
        1 => ["Nasi Goreng", 10000],
        2 => ["Mie Goreng", 10000],
    ],
    "Minuman" => [
        3 => ["Es Teh", 2000],
        4 => ["Es Jeruk", 5000],
    ]
];

$total = 0;
$struk = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["pilihan"])) {
        foreach ($_POST["pilihan"] as $id => $jumlah) {
            if ($jumlah > 0) {
                foreach ($menu as $kategori => $items) {
                    if (isset($items[$id])) {
                        $nama = $items[$id][0];
                        $harga = $items[$id][1];
                        $subtotal = $harga * $jumlah;
                        $total += $subtotal;

                        $struk .= "$nama <br>";
                        $struk .= "$jumlah Pcs  x  Rp." . number_format($harga, 0, ',', '.') . "  =  Rp." . number_format($subtotal, 0, ',', '.') . "<br><br>";
                    }
                }
            }
        }
        if ($total > 0) {
            $struk .= "<hr>";
            $struk .= "<b>TOTAL BAYAR  =  Rp." . number_format($total, 0, ',', '.') . "</b>";
        }
    }
}
?>

<h2>===== Menu Makanan dan Minuman =====</h2>
<form method="post">
    <?php foreach ($menu as $kategori => $items): ?>
        <h3><?php echo strtoupper($kategori); ?> :</h3>
        <?php foreach ($items as $id => $item): ?>
            <?php echo str_pad($item[0], 15); ?> 
            Rp. <?php echo number_format($item[1], 0, ',', '.'); ?>/pcs 
            <input type="number" name="pilihan[<?php echo $id; ?>]" min="0" placeholder="0"><br><br>
        <?php endforeach; ?>
    <?php endforeach; ?>
    <br>
    <button type="submit">Hitung Total</button>
</form>

<?php if ($struk != ""): ?>
    <hr>
    <h2>====== Struk Belanja ======</h2>
    <?php echo $struk; ?>
<?php endif; ?>
