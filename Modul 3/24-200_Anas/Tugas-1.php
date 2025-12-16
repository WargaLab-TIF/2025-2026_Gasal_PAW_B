<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";
echo "<br>";

$fruits[]='Salak';
$fruits[]='Anggur';
$fruits[]='Pisang';
$fruits[]='Mangga';
$fruits[]='Manggis';

$index_tertinggi = count($fruits) - 1;
echo "Nilai dengan indeks tertinggi adalah: " . $fruits[$index_tertinggi] . "<br>";
echo "Indeks tertinggi dari array \$fruits adalah: " . $index_tertinggi;
?>
