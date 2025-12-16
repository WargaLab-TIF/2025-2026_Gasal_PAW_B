<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

for ($i = 0; $i < 5; $i++) {
    $fruits[] = "Fruit_" . ($i + 1);
}

$arrlength = count($fruits);
echo "Jumlah data saat ini: $arrlength<br><br>";


for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}

$vegies = array("Carrot", "Broccoli", "Spinach");
echo "<br>Data array sayuran:<br>";
for ($x = 0; $x < count($vegies); $x++) {
    echo $vegies[$x] . "<br>";
}
?>