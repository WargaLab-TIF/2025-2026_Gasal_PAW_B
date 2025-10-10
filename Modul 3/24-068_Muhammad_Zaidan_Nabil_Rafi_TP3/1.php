<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

array_push($fruits, "Durian", "Mango", "Apple", "Pear", "Watermelon");
echo "Indeks tertinggi: " . (count($fruits) - 1) . "<br>";

unset($fruits[2]); 
echo "Setelah dihapus, indeks tertinggi: " . (max(array_keys($fruits))) . "<br>";

$vegies = array("Carrot", "Broccoli", "Spinach");
echo "Isi array vegies:<br>";
print_r($vegies);
?>