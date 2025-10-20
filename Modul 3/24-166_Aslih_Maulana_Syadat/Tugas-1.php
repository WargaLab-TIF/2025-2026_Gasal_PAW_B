<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . "." ;

echo "<br>";
echo "<br>";

echo "<b>Menambahkan lima data baru dalam array: </b><br>";
array_push($fruits, "Buah Naga", "Salak", "Rambutan", "Mangga", "Jeruk");
echo "Nilai dengan indeks tertinggi dari array: " . $fruits[count($fruits)-1];
$index = count($fruits)-1;
echo "<br> Index Tertinggi " . $index;

echo "<br>";
echo "<br>";

echo "<b>Menghapus satu data dari array: </b><br>";
unset($fruits[7]);
echo "Nilai dengan indeks tertinggi dari array: " .  $fruits[count($fruits)-1];
$index = count($fruits)-1;
echo "<br> Index Tertinggi " . $index;

echo "<br>";
echo "<br>";

echo "<b>Buat array baru: </b><br>";
$vigies = array("Bayam", "Tomat", "Wortel");
foreach ($vigies as $value) {
    echo $value . "<br>";
}
?>