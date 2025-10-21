<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);
for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}
echo "<br>";

echo "Menambahkan 5 Data dengan FOR Loop: <br>";
$fruits = array("Avocado", "Blueberry", "Cherry");
$newFruits = array("Durian", "Elderberry", "Fig", "Grape", "Honeydew");
for($i = 0; $i < count($newFruits); $i++) {
    $fruits[] = $newFruits[$i];
}
echo "Panjang array: " . count($fruits) . "<br><br>";
$arrlength = count($fruits);
for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}
echo "<br>";

echo "array baru: <br>";

$vegies = array("Carrot", "Broccoli", "Spinach");
$arrlength = count($vegies);

for($x = 0; $x < $arrlength; $x++) {
    echo $vegies[$x] . "<br>";
}
?>