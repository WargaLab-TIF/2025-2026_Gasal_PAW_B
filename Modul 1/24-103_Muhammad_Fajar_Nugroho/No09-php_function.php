<?php
// Fungsi dasar tanpa argumen
function salam() {
    return "Hello, Selamat datang di PHP!";
}
echo salam();

// Fungsi dengan 1 argumen
function kuadrat($angka) {
    return $angka * $angka;
}
echo "<br>Hasil kuadrat dari 5 adalah: " . kuadrat(5); // Output: 25

// Fungsi dengan lebih dari 1 argumen.
function tambah($a, $b) {
    return $a + $b;
}
echo "<br>Hasil penjumlahan 3 dan 4 adalah: " . tambah(3, 4); // Output: 7

// Fungsi dengan nilai default untuk argumen
function sapa($nama = "Tamu") {
    return "Halo, $nama!";
}
echo "<br>" . sapa(); // Output: Halo, Tamu!
echo "<br>" . sapa("Andi"); // Output: Halo, Andi!

// Fungsi yang mengembalikan nilai (return).
function hitungLuasPersegi($sisi) {
    return $sisi * $sisi;
}
echo "<br>Luas persegi dengan sisi 6 adalah: " . hitungLuasPersegi(6);  // Output: 36
?>