<?php

function halo() {
    echo "Halo ini zaidan, ini dari fungsi!<br>";
}

function sapa($nama) {
    echo "Halo, $nama!<br>";
}

function tambah($a, $b) {
    echo "Hasil penjumlahan: " . ($a + $b) . "<br>";
}

function perkenalan($nama = "Anonim") {
    echo "Halo, nama saya $nama<br>";
}

function kali($x, $y) {
    return $x * $y;
}

halo();
sapa("Zaidan");
tambah(5, 3);
perkenalan();
perkenalan("Amel");
echo "Hasil perkalian: " . kali(4, 6);
?>
