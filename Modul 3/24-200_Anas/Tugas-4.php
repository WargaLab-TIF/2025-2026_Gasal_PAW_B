<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);
echo "Panjang array sebelum penambahan: " . $arrlength . "<br><br>";

for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}
echo "<br>";

for ($i = 1; $i <= 5; $i++) {
    $fruits[] = "Jeruk";
}
echo "<br>";

$arrlength = count($fruits);
echo "Panjang array setelah penambahan: " . $arrlength . "<br><br>";
for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}
?>