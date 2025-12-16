<?php
$fruits = array("Avocado", "Blueberry", "Cherry", "Durian", "Elderberry", "Fig", "Grape", "Honeydew");
$arrlength = count($fruits);
// Pertanyaan No 1 : Menambahkan lima data baru dalam array $fruits
for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}
echo "<br>";
echo "<hr>";

// Array $vegies dengan FOR
$vegies = array("Carrot", "Broccoli", "Spinach");
for ($i = 0; $i < 3; $i++) {
    echo $vegies[$i] . "<br>";
}
?>
