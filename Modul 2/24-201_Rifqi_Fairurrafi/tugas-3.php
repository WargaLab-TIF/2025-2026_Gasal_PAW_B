<?php
$umur = 17;

if ($umur < 5) {
    echo "Tiket gratis untuk anak nanak dibawah usia 5 Tahun";
} elseif ($umur < 13) {
    echo "Harga tiket anak-anak: Rp10.000";
} elseif ($umur < 60) {
    echo "Harga tiket dewasa: Rp20.000";
} else {
    echo "Diskon khusus lansia: Rp15.000";
}
?>
