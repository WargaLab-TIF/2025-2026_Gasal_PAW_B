<?php
// Fungsi tanpa argumen
function sapa() {
    echo "halo, selamat datang<br>";
}

// Fungsi tanpa argumen
function halo($nama) {
    echo "halo, $nama!<br>";
}

// Fungsi dengan lebih dari 1 argumen
function tambah($a, $b) {
    echo "hasil penjumlahan: " . ($a + $b) . "<br>";
}

// Fungsi dengan default value
function kenalan($nama = "anonim") {
    echo "perkenalkan, saya $nama<br>";
}

// Fungsi dengan return
function kali($x, $y) {
    return $x * $y;
}

// Panggil fungsi
sapa();
halo("sabrina");
tambah(5, 7);
kenalan();
kenalan("rina");
echo "hasil perkalian: " . kali(4, 6);
?>