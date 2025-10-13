<?php
$fruits = ["Avocado", "Blueberry", "Cherry"];
$veggies = ["Sawi", "Timun", "Tomat"];

array_push($fruits, "Melon", "Mangga", "Anggur", "Jeruk", "Nanas");


$arrlengt = count($veggies);
for($x = 0; $x < $arrlengt; $x++){
    echo $veggies[$x];
    echo "<br>";
}