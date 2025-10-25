<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";

array_push($fruits, "Mangoo", "Durian", "Nangka", "Banana", "Aple");
echo "<br>";
var_dump($fruits);
echo "<hr>";


unset($fruits[3]);
echo "<br>";
var_dump($fruits);

//soalsub3

$vegies = ["Wortel", "Brokoli", "Asparagus"];
echo "<br>";
echo "<hr>";
foreach($vegies as $data) {
    echo $data."<br>";
};
echo "<hr>";
echo $fruits[max(array_keys($fruits))];

?>