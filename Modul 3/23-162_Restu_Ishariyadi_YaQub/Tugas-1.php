<?php

$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".<br><br>";


# menambah 5 data baru

echo "<b>Soal 1</b><br>";
$fruits[] = "Durian";
$fruits[] = "Sukun";
$fruits[] = "Banana";
$fruits[] = "Grape";
$fruits[] = "Apple";

$indeks_tertinggi = count($fruits) - 1;
echo "Indeks tertinggi: " . $fruits[$indeks_tertinggi] . "<br>";
echo "Indeks tertinggi array: " . $indeks_tertinggi . "<br><br>";

# hapus data tertentu
echo "<b>Soal 2</b><br>";
unset($fruits[1]);

$kunci_array = array_keys($fruits);
$indeks_terakhir_sebenarnya = end($kunci_array);

echo "Nilai dengan indeks tertinggi setelah indeks 1 dihapus " . $fruits[$indeks_terakhir_sebenarnya] . "<br>";

echo "Indeks tertinggi dari array yg sekarang adalah " . $indeks_terakhir_sebenarnya . "<br><br>";

# array baru
echo "<b>Soal 3</b><br>";
$vegies = array("Carrot", "Broccoli", "Spinach");
echo "Seluruh data dari array:<br>";
print_r($vegies);
?>