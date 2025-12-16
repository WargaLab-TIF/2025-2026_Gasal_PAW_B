<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$data_new = array("watermelon", "salak", "orange", "banana", "mango");
$arrlength = count($data_new);
for ($x = 0; $x < $arrlength; $x++) {
    array_push($fruits, $data_new[$x]);
}
print_r($fruits);
echo '<br>';

$vegies = array("carrot", "chili", "brocoli");
$arrlength = count($vegies);
for ($x = 0; $x < $arrlength; $x++) {
    echo $vegies[$x];
    echo '<br>';
}
?>