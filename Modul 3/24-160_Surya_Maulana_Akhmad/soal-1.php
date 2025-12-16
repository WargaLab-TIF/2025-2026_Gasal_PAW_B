<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";

echo "<br>";
// pertanyaan 1
// menambah  5 data baru
array_push($fruits, "Apel", "Orange", "Mango", "Guava", "Banana");

// menampilkan nilai dan indeks tertinggi 
$indeks_tertinggi = count($fruits) - 1;
echo "Nilai: " . $fruits[$indeks_tertinggi] . "<br>";
echo "Indeks tertinggi: " . $indeks_tertinggi . "<br><br>";

// pertanyaan 2
// // menghapus salah satu data 
$item = array_search("Banana", $fruits);

unset($fruits[$item]);

$indeks_tertinggi = count($fruits) - 1;
echo "Nilai: " . $fruits[$indeks_tertinggi] . "<br>";
echo "Indeks tertinggi: " . $indeks_tertinggi . "<br><br>";



// pertanyaan 3
$vegies = array("Data 1", "Data 2", "Data 3");

foreach ($vegies as $item ) {
   echo $item . "<br>";
}
