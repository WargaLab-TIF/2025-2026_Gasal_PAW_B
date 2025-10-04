<?php
// Fungsi tanpa argumen
function salam() {
    echo "Halo, Selamat Datang<br>";
}

// Fungsi dengan 1 argumen
function sapa($nama) {
    echo "Halo, $nama<br>";
}

// Fungsi dengan lebih dari 1 argumen
function tambah($a, $b) {
    return $a + $b;
}

// Fungsi dengan default value
function perkenalan($nama = "Anonim") {
    echo "Halo, nama saya $nama.<br>";
}

// Fungsi yang mengembalikan nilai
function kali($a, $b) {
    return $a * $b;
}

// Pemanggilan fungsi
salam();
sapa("Budiono");
echo "Hasil penjumlahan: " . tambah(5, 3) . "<br>";
perkenalan("Andi");
perkenalan();
echo "Hasil perkalian: " . kali(4, 2) . "<br>";
?>
