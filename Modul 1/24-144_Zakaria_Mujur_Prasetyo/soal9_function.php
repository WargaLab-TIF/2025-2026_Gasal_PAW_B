<?php
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
echo "fungsi tanpa argumen<br>";
sapa();

echo "<br>fungsi dengan 1 argumen<br>";
sapaNama("Zakk");

echo "<br>fungsi dengan  lebih 1 argumen<br>";
echo "Hasil tambah 7 + 5 = " . tambah(7, 5) . "<br>";

echo "<br>fungsi dengan default value<br>";
echo salam() . "<br>";

echo "<br>fungsi yang mengembalikan nilai<br>";
echo salam("Zakaria") . "<br>";

echo "<br>fungsi yang mengembalikan nilai #2<br>";
echo "Hasil kali 4 * 6 = " . kali(4, 6) . "<br>";
?>
