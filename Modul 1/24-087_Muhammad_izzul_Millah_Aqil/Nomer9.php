<?php
function halo() {
    echo "Halo dari fungsi!<br>";
}

function sapa($nama) {
    echo "Halo, $nama!<br>";
}

function tambah($a, $b) {
    echo "Hasil penjumlahan: " . ($a + $b) . "<br>";
}

function perkenalan($nama = "Rahasia") {
    echo "Halo, nama saya $nama<br>";
}

function kali($x, $y) {
    return $x * $y;
}

halo();
sapa("Izzul");
tambah(10, 10);
perkenalan();
perkenalan("Millah");
echo "Hasil perkalian: " . kali(10, 10);
?>
