<?php
echo "<b>Sebelum ditambahkan 5 data</b><br>";
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);

for($x = 0 ; $x < $arrlength ; $x++){
    echo $fruits[$x];
    echo "<br>";
}

echo "<br><br>";
echo "<b>Sesudah ditambahkan 5 data</b><br>";
array_push($fruits, "Manggo", "Watermelon", "Apple", "Starfruit", "Devil Fruit");
$arrlength = count($fruits);

for($x = 0 ; $x < $arrlength ; $x++){
    echo $fruits[$x];
    echo "<br>";
}

echo "<br><br>";
$veggies = ["Carrot", "Cabbages", "Brocoli"];
$vegglength = count($veggies);

for($x = 0 ; $x < $vegglength ; $x++){
    echo $veggies[$x];
    echo "<br>";
}
?>