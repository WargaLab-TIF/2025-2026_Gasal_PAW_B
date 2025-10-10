<?php
$fruits = array("Avocado", "Blueberry", "Cherry", "Durian", "Mango", "Apple", "Pear", "Watermelon");
$arrlength = count($fruits);



for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x] . "<br>";
}

echo "<br>";
echo "Jumlah data: $arrlength <br>";


echo "<br>";

$vegies = array("wortel", "Brokoli", "bayam");
for($x = 0; $x < count($vegies); $x++) {
    echo $vegies[$x] . "<br>";
}
