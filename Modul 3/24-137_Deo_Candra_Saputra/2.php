<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);
echo "data awal pada array fruits <br>";
for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}
echo "<br>";

$newfruits= array("Durian", "Mango", "Apple", "Pear", "Watermelon");
for ($i = 0; $i < count($newfruits); $i++) {
    $fruits[] = $newfruits[$i];
}
$arrlength = count($fruits);
echo "data pada array fruits setelah di tambah lima data baru<br>";
for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}
echo "Jumlah data: $arrlength <br>";
echo "<br>";

$vegies = array("Tomato", "Peas", "Lettuce");
echo "data pada array vegies <br>";
for($x = 0; $x < count($vegies); $x++) {
    echo $vegies[$x] . "<br>";
}
?>
