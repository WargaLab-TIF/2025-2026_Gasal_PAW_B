<?php

$ipka = 3.5;
$ipkb = 3.7;
$ipkc = 3.0;
$ipkd = 4.0;

echo "IPK MAHASISWA A = $ipka<br>";
echo "IPK MAHASISWA B = $ipkb<br>";
echo "IPK MAHASISWA C = $ipkc<br>";
echo "IPK MAHASISWA D = $ipkd<br>";

function Pilih_Nilai($ipk1, $ipk2) {
    if ($ipk1 > $ipk2) {
        return "IPK pertama lebih besar dari IPK kedua";
    } elseif ($ipk1 < $ipk2) {
        return "IPK kedua lebih besar dari IPK pertama";
    } else {
        return "IPK pertama sama dengan IPK kedua";
    }
}

echo "<br> Perbandingan A vs B: " . Pilih_Nilai($ipka, $ipkb) . "<br>";
echo "Perbandingan A vs C: " . Pilih_Nilai($ipka, $ipkc) . "<br>";
echo "Perbandingan B vs D: " . Pilih_Nilai($ipkb, $ipkd) . "<br>";

?>