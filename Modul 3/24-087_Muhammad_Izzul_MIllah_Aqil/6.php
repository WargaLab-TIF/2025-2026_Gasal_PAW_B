<?php
$arr1 = array("Red", "Green");
$arr2 = array("Blue", "Yellow", "Purple");


array_push($arr1, "Black");
var_dump($arr1);
echo "<br>";

$merged = array_merge($arr1, $arr2);
var_dump($merged);

echo "<br>";

$values = array_values($merged);
var_dump($values);

echo "<br>";

$find = array_search("Blue", $merged);
echo "Index Blue: $find<br>";

echo "<br>";

$filtered = array_filter($merged, function($color){
    return strlen($color) > 5;
});
var_dump($filtered);

echo "<br>";

sort($merged);
var_dump($merged);

