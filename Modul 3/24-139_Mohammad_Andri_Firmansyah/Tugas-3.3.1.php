<?php

# Kode dari soal
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";

echo "<hr>";
/* 1. Menambahkan lima data baru dalam array $fruits! Tampilkan nilai dengan indeks
tertinggi dari array $fruits! Berapa indeks tertinggi dari array $fruits? */

array_push($fruits, "Banana", "Grape", "Apple", "Strawberry", "Mangoesten");

$indeks_tertinggi = count($fruits)-1;
echo($fruits[$indeks_tertinggi]);
echo "<br>";

echo "Indeks Tertinggi = " . $indeks_tertinggi;

echo "<hr>";
/* 2. Hapus satu data tertentu dari array $fruits! Tampilkan nilai dengan indeks tertinggi
dari array $fruits! Berapa indeks tertinggi dari array $fruits? */

array_splice($fruits, 5, 1);

$indeks_tertinggi = count($fruits)-1;
echo($fruits[$indeks_tertinggi]);
echo "<br>";

echo "Indeks Tertinggi Saat ini= " . $indeks_tertinggi;

echo "<hr>";
/* 3. Buat array baru dengan nama $vegies yang memiliki tiga buah data! Tampilkan
seluruh data dari array $vegies! */
$vegies = array("Corn", "Tomato", "Potato");

foreach($vegies as $v){
    echo $v . "<br>";
}
?>