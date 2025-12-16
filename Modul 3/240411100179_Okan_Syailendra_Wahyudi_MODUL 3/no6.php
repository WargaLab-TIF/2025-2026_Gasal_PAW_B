<?php
$fruits = array("Apple", "Banana", "Cherry");

// 1. array_push()
array_push($fruits, "Durian");
echo "Setelah array_push(): ";
print_r($fruits);
echo "<br><br>";

// 2. array_merge()
$moreFruits = array("Mango", "Orange");
$merged = array_merge($fruits, $moreFruits);
echo "Setelah array_merge(): ";
print_r($merged);
echo "<br><br>";

$values = array_values($merged);
echo "Hasil array_values(): ";
print_r($values);
echo "<br><br>";

$pos = array_search("Cherry", $merged);
echo "Posisi 'Cherry' adalah indeks ke-$pos<br><br>";

$filtered = array_filter($merged, function($val){
    return strlen($val) > 5;
});
echo "Hasil array_filter(): ";
print_r($filtered);
echo "<br><br>";

sort($merged);
echo "Hasil sort(): ";
print_r($merged);
?>