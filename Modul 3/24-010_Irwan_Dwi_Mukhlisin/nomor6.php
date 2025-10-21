<?php

$fruits = array("Apple", "Banana", "Cherry");
array_push($fruits, "Durian", "Mango");
echo "<h3>1. array_push</h3>";
print_r($fruits);
echo "<br><br>";

$vegetables = array("Carrot", "Spinach", "Broccoli");
$merged = array_merge($fruits, $vegetables);
echo "<h3>2. array_merge</h3>";
print_r($merged);
echo "<br><br>";

$student = array("nama" => "Irwan", "nim" => "240422", "jurusan" => "Informatika");
$values = array_values($student);
echo "<h3>3. array_values</h3>";
print_r($values);
echo "<br><br>";

echo "<h3>4. array_search</h3>";
$index = array_search("Mango", $fruits);
echo "Index mango: $index<br>";
echo "<br>";

echo "<h3>5. array_filter</h3>";
$filtered = array_filter($merged, function ($buah) {
    return strlen($buah) > 6;
});
print_r($filtered);
echo "<br><br>";

echo "<h3>6. Sorting Array</h3>";

$names = array("Irwan", "Budi", "Agus", "Doni");
echo "<b>Asli:</b><br>";
print_r($names);
echo "<br>";

sort($names);
echo "<b>Sort</b> (A-Z):<br>";
print_r($names);
echo "<br>";