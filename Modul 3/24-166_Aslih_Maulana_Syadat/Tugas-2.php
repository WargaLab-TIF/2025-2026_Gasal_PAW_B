<?php
echo "<h2><b>Soal 1</b></h2>";
$fruits = array("Avocado", "Blueberry", "Cherry");
$newFruits = array("Buah Naga", "Salak", "Rambutan", "Mangga", "Jeruk");

for($i = 0; $i < count($newFruits); $i++) {
  $fruits[] = $newFruits[$i];
}

$arrlength = count($fruits);

echo "<b>Seluruh data buah saat ini:</b><br>";
for($x = 0; $x < $arrlength; $x++) {
  echo $fruits[$x];
  echo "<br>";
}
echo "<br>";
echo "Panjang Data: " . $arrlength;

echo "<h2><b>Soal 2</b></h2>";
$vegies = array("Bayam", "Tomat", "Wortel");

$vegieLength = count($vegies);

echo "<b>Seluruh data sayuran:</b><br>";
for($x = 0; $x < $vegieLength; $x++) {
  echo $vegies[$x];
  echo "<br>";
}
?>