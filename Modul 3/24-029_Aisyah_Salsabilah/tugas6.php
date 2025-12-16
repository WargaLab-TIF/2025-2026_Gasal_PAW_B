<?php
$a = array("Red", "Green");
$b = array("Blue", "Yellow");
$c = array(1=>"Apple", 2=>"Banana", 3=>"Cherry", 4=>"Mango");

array_push($a, "Orange", "Purple");

$merged = array_merge($a, $b);

print_r(array_values($c));

echo "Posisi Banana: " . array_search("Banana", $c) . "<br>";

$filtered = array_filter($c, function($item){
    return str_starts_with($item, "B");
});
print_r($filtered);

sort($a);
rsort($b);
asort($c);
?>