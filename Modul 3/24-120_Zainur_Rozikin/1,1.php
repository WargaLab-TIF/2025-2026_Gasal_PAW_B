<?php
$fruits = ["Avocado", "Blueberry", "Cherry"];
array_push($fruits, "Appel", "Mangga", "Melon", "Semangka", "Sawo");
$tinggi = max(array_keys($fruits));

print_r($fruits);
echo "<br>";
echo "index tertinggi adalah $tinggi";
 