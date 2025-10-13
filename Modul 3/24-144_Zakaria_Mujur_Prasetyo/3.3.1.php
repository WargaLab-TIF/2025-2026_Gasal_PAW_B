<?php
$fruits = array("Avocado", "Blueberry", "Cherry",);
echo "data lama <br> I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";
array_push($fruits,"Watermelon","Apple","Stroberi", "Pinneaple", "Grape <br>");
echo "<br> data baru <br> I like " . $fruits[0] . ", " . $fruits[1] . ", " . $fruits[2] . ", " . $fruits[3] . ", " . $fruits[4] . ", " . $fruits[5] . ", " . $fruits[6] . ", " . $fruits[7] . ".";
// soal 1
echo "<br> <br>  1. Menambahkan lima data baru dalam array $ fruits! Tampilkan nilai dengan indeks ntertinggi dari array $ fruits! Berapa indeks tertinggi dari array $ fruits?";
$lastIndex = array_key_last($fruits);
echo "<br> <br> jawab: indeks tertinggi ".$fruits[$lastIndex]." indeks: ".$lastIndex;
echo "<br> <br>";
// soal 2
echo "2.Hapus satu data tertentu dari array $ fruits! Tampilkan nilai dengan indeks tertinggi dari array $ fruits! Berapa indeks tertinggi dari array $ fruits?";
$fruits = array_slice($fruits, 0, 7);
echo "<br> <br> data baru <br> I like " . $fruits[0] . ", " . $fruits[1] . ", " . $fruits[2] . ", " . $fruits[3] . ", " . $fruits[4] . ", " . $fruits[5] . ", " . $fruits[6] . ".";
$lastIndex = array_key_last($fruits);
echo "<br> <br> jawab: {$fruits[$lastIndex]}";
echo "<br> Indeks tertinggi sekarang: {$lastIndex}";
echo "<br> <br>";
// soal 3
echo "3.Buat array baru dengan nama $ vegies yang memiliki tiga buah data! Tampilkan seluruh data dari array $ vegies!";

$vegies = ["Alpukat", "Semangka", "Apel"];
echo "<br> <br> jawab: ";
foreach($vegies as $v) {
    echo "<br>" . $v;
}
?>