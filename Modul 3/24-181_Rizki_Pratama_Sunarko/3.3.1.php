<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".<br><hr>";

/*
Menambahkan lima data baru dalam array $fruits! Tampilkan nilai dengan indeks
tertinggi dari array $fruits! Berapa indeks tertinggi dari array $fruits?
*/
array_push($fruits, "Durian", "Strawbery", "Apel", "Semangka", "Kedondong");

echo "Data buah  setelah ditambah:<br>";
var_dump($fruits);
echo "<br>";
$nilai_tertinggi = array_key_last($fruits);
echo "Nilai tertinggi pada array fruits adalah: " . $fruits[$nilai_tertinggi] . " dengan nilai index: " . $nilai_tertinggi;
echo "<hr>";

/*
Hapus satu data tertentu dari array $fruits! Tampilkan nilai dengan indeks tertinggi
dari array $fruits! Berapa indeks tertinggi dari array $fruits?
*/
unset($fruits[2]);
$fruits = array_values($fruits);
echo "Data buah setelah dihapus:<br>";
var_dump($fruits);
echo "<br>";
$nilai_tertinggi = array_key_last($fruits);
echo "Nilai tertinggi pada array fruits adalah: " . $fruits[$nilai_tertinggi] . " dengan nilai index: " . $nilai_tertinggi;
echo "<hr>";

/*
Buat array baru dengan nama $vegies yang memiliki tiga buah data! Tampilkan
seluruh data dari array $vegies!
*/
$vegies = array("Bayam", "Kangkung", "Sawi");
echo "Data pada array vegies:<br>";
foreach($vegies as $value) {
    echo $value . "<br>";
}
