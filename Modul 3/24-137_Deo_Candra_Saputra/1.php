<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";
echo "<br>";
echo "<br>";
echo "data awal pada array fruits <br>";
var_dump(value:$fruits);
echo "<br>";
echo "<br>";
echo "data pada array fruits setelah ditambah lima data baru<br>";
array_push($fruits, "Durian", "Mango", "Apple", "Pear", "Watermelon");
var_dump(value:$fruits);
echo "<br>";
echo "Indeks tertinggi: " . (count($fruits) - 1) . "<br>";
echo "<br>";
    
echo "data pada array fruits setelah dihapus 1 data<br>";
array_pop($fruits);
var_dump($fruits);
echo "<br>";
echo "indeks tertinggi: " .(count($fruits) - 1). "<br>";
echo "<br>";

$vegies = array("Tomato", "Peas", "Lettuce");
echo "data pada array vegies<br>";
var_dump($vegies);
echo "<br>";
?>
