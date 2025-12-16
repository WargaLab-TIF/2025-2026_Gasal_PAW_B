<?php
// Fungsi dasar tanpa argumen
function sapa() {
    echo "Halo, dunia<br>";
}

// Fungsi dengan 1 argumen
function sapaNama($nama) {
    echo "Hai, $nama<br>";
}

// Fungsi dengan lebih dari 1 argumen
function hitungLuas($panjang, $lebar) {
    $luas = $panjang * $lebar;
    echo "Luas persegi panjang adalah $luas.<br>";
}

// Fungsi dengan nilai default
function sapaWaktu($nama, $waktu = "Siang") {
    echo "Selamat $waktu, $nama<br>";
}

// Fungsi yang mengembalikan nilai (return)
function tambah($a, $b) {
    return $a + $b;
}

// Memanggil semua fungsi
sapa();
sapaNama("Roky");
hitungLuas(10, 5);
sapaWaktu("ryko"); // Menggunakan nilai default
sapaWaktu("ryky", "sore"); // Memberikan nilai baru
$hasil = tambah(7, 10);
echo "Hasil penjumlahan dari fungsi return adalah $hasil.<br>";
?>