<?php
// 09_functions.php — Contoh fungsi

// Fungsi dasar tanpa argumen
function sapa() {
  echo "Halo!<br>";
}

// Fungsi dengan 1 argumen
function sapaNama($nama) {
  echo "Halo, $nama!<br>";
}

// Fungsi dengan >1 argumen
function tambah($x, $y) {
  return $x + $y;
}

// Fungsi dengan default value
function salam($nama = "Teman") {
  return "Selamat datang, $nama!";
}

// Fungsi yang mengembalikan nilai
function kali($x, $y) {
  return $x * $y;
}

// Demo pemanggilan
sapa();
sapaNama("rozi");
echo "Hasil tambah 7 + 5 = " . tambah(7, 5) . "<br>";
echo salam() . "<br>";
echo salam("rozikin") . "<br>";
echo "Hasil kali 4 * 6 = " . kali(4, 6) . "<br>";
?>
