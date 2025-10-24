<?php 
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";
echo "<br><br>";

array_push($fruits, "Durian", "Mango", "Orange", "Papaya", "Strawberry");
print_r($fruits);
echo "<br><br>";

unset($fruits[4]);
print_r($fruits);
echo "<br><br>";

$vegies = array("Carrot", "Spinach", "Broccoli");
print_r($vegies);
?>