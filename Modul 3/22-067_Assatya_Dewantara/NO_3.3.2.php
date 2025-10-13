
<?php 
$fruits = array("Avocado", "Blueberry", "Cherry");

// menambahkan 5 data baru 
$newFruits = array("Durian", "Mango", "Orange", "Papaya", "Strawberry");
$newLength = count($newFruits);

for ($i = 0; $i < $newLength; $i++) { 
    $fruits[] = $newFruits[$i];
}

$arrlength = count($fruits);

for ($x = 0; $x < $arrlength; $x++) { 
    echo $fruits[$x];
    echo "<br>";
}
echo "<br><br>";
echo "array baru:";
echo "<br><br>";

// array baru
$vegies = array("Carrot", "Spinach", "Broccoli");

$arrlength = count($vegies);

for ($j = 0; $j < $arrlength; $j++) { 
    echo $vegies[$j];
    echo "<br>";
}
?>

