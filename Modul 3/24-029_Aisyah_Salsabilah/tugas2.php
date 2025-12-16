<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

for($i = 0; $i < 5; $i++){
    $fruits[] = "Fruit_" . ($i+1);
}

$arrlength = count($fruits);

for($x = 0; $x < $arrlength; $x++){
    echo $fruits[$x] . "<br>";
}

$vegies = array("Carrot", "Broccoli", "Spinach");
for($i = 0; $i < count($vegies); $i++){
    echo $vegies[$i] . "<br>";
}
?>