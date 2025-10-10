<?php
$arr1 = array("Red", "Green");
$arr2 = array("Blue", "Yellow", "Purple");

array_push($arr1, "Black");
print_r($arr1);

$merged = array_merge($arr1, $arr2);
print_r($merged);

$values = array_values($merged);
print_r($values);

$find = array_search("Blue", $merged);
echo "Index Blue: $find<br>";

$filtered = array_filter($merged, function($color){
    return strlen($color) > 5;
});
print_r($filtered);

sort($merged);
print_r($merged);
?>
