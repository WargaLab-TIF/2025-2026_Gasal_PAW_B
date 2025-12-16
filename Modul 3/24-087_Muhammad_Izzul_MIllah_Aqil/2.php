<?php
$fruits = array("alpukat", "Blueberry", "Ceri", "Durian", "Mangga", "Apel", "Pear", "");
$arrlength = count($fruits);


// 1

for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}

echo "<br>";
echo "Jumlah data: $arrlength <br>";


echo "<br>";
// 2

$vegies = array("wortel", "Brokoli", "bayam");
for($x = 0; $x < count($vegies); $x++) {
    echo $vegies[$x] . "<br>";
}

