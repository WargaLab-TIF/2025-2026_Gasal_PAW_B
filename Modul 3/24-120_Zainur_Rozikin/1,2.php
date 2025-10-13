<?php
$fruits = ["Avocado", "Blueberry", "Cherry"];
array_splice($fruits, 1, 1);
$tinggi = max(array_keys($fruits));

print_r($fruits);
echo "<br>";
echo "index tertinggi adalah $tinggi";
