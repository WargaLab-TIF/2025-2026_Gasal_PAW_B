<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo"Daftar fruits :<br>";
for ($i = 1; $i <= 5; $i++) {
    $fruits[] = "Data Buah " . $i;
}

$arrlength_fruits = count($fruits);
for($x = 0; $x < $arrlength_fruits; $x++) {
echo $fruits[$x];
echo "<br>";
}

echo "<br>Jumlah data : $arrlength_fruits Data<br><br>";
echo"Daftar vegies :<br>";
$vegies = array("brocoli", "Tomato", "carrot");
$arrlength_vegies = count($vegies);
for($x = 0; $x < $arrlength_vegies; $x++) {
    echo $vegies[$x];
    echo "<br>";
}
echo "<br>Jumlah data : $arrlength_vegies Data<br>";
?>