<?php
function salam() {
    echo "Halo, malam<br>";
}
salam();

function sapa($nama) {
    echo "Halo $nama!<br>";
}
sapa("Hendrik");

function tambah($a, $b) {
    echo "Hasil penjumlahan $a + $b = " . ($a + $b) . "<br>";
}
tambah(5, 7);

function sapa2($nama = "Manusia") {
    echo "Selamat datang, $nama!<br>";
}
sapa2();            // pakai default
sapa2("Mahasiswa"); // pakai argumen

function kali($x, $y) {
    return $x * $y;
}
$hasil = kali(6, 8);
echo "Hasil perkalian 6 x 8 = $hasil<br>";
?>
