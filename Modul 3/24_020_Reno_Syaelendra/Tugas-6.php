<?php
$arr1 = array("A", "B", "C");
$arr2 = array("D", "E");

// Pertnyaan No 1 : array_push
array_push($arr1, "F", "G");
echo "<pre>";

// Pertanyaan No 2 : array_merge
$merged = array_merge($arr1, $arr2);

// Pertanyaan No 3 : array_values
$values = array_values($merged);

// Pertanyaan No 4 : array_search
$index = array_search("C", $merged);
echo "Index dari 'C': $index<br>";
echo "<hr>";

// Pertanyaan No 5 : array_filter
$filtered = array_filter($merged, function($val) {
    return $val != "B";
});

// Pertanyaan No 6 : fungsi sorting
echo "Hasil array_filter:<br>";
print_r($filtered);
echo "<hr>";

// Sorting
sort($merged);
echo "Sorted ascending:<br>";
print_r($merged);
echo "<hr>";


rsort($merged);
echo "Sorted descending:<br>";
print_r($merged);
echo "<hr>";
?>
