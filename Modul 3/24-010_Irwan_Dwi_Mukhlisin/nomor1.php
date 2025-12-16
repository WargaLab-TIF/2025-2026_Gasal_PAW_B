<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
array_push($fruits, "watermelon", "salak", "orange", "banana", "mango");
$last = count($fruits) - 1;
print_r($fruits);
echo '<br>';
echo "$fruits[$last] indeks $last";
echo '<br>';

array_pop($fruits);
print_r($fruits);
echo '<br>';
$last = count($fruits) - 1;
echo "$fruits[$last] indeks $last";
echo '<br>';

$vegies = array("carrot", "chili", "brocoli");
print_r($vegies);
?>