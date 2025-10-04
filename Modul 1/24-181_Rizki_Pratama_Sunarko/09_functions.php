<?php
// 09_functions.php — Contoh penggunaan fungsi di PHP

// Fungsi dasar tanpa argumen
function halo() {
    echo "Halo, selamat datang di PHP!<br>";
}

// Fungsi dengan 1 argumen
function sapa($nama) {
    echo "Halo, $nama!<br>";
}

// Fungsi dengan lebih dari 1 argumen
function tambah($a, $b) {
    echo "$a + $b = " . ($a + $b) . "<br>";
}

// Fungsi dengan default value
function kenalan($nama = "Rizki Pratama Sunarko") {
    echo "Perkenalkan, nama saya $nama<br>";
}

// Fungsi yang mengembalikan nilai (return)
function kali($x, $y) {
    return $x * $y;
}

// --- Pemanggilan ---
halo();
sapa("Budi");
tambah(5, 3);
kenalan();                // pakai default
kenalan("Sunarko");       // override default

$hasil = kali(4, 6);
echo "Hasil kali 4 * 6 = $hasil<br>";
?>
