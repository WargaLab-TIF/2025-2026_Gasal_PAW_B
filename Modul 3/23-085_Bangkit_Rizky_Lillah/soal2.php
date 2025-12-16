<?php
#3.3.2.1

echo "<b>Soal 3.3.2.1</b> <br><br>";
$fruits = array("Avocado", "Blueberry", "Cherry");
array_push($fruits, "Apple", "Banana", "Durian", "Mango", "Orange");

$arrlength = count($fruits);

echo "Jumlah data array \$fruits: " . $arrlength . "<br>";
for($x = 0; $x < $arrlength; $x++) {
    echo "Data ke-" . $x+1 . " : " . $fruits[$x] . "<br>";
}

#3.3.2.2
echo "<br><b>Soal 3.3.2.2</b> <br><br>";
$vegies = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($vegies);

echo "Jumlah data pada array \$vegies: " . $arrlength . "<br>";
for($x = 0; $x < $arrlength; $x++) {
    echo "Data ke-" . $x+1 . " : " . $vegies[$x] . "<br>";
}


?>
