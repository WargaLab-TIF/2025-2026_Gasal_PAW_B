<?php
echo "<h3>1. array_push()</h3>";
$arr1 = ["apel", "jeruk"];
array_push($arr1, "mangga", "pisang");
print_r($arr1);

echo "<h3>2. array_merge()</h3>";
$arr2 = ["a" => "merah", "b" => "biru"];
$arr3 = ["c" => "kuning", "d" => "hijau"];
$merged = array_merge($arr2, $arr3);
print_r($merged);

echo "<h3>3. array_values()</h3>";
$arrAssoc = ["nama" => "Andi", "umur" => 20, "kota" => "Bandung"];
$values = array_values($arrAssoc);
print_r($values);

echo "<h3>4. array_search()</h3>";
$arr4 = ["kucing", "anjing", "kelinci"];
$search = array_search("anjing", $arr4);
echo "Index 'anjing' di array: " . $search;

echo "<h3>5. array_filter()</h3>";
$arr5 = [1, 2, 3, 4, 5, 6];
$filtered = array_filter($arr5, function($v) { return $v % 2 == 0; });
print_r($filtered);

echo "<h3>6. Fungsi Sorting</h3>";
$arr6 = [5, 2, 8, 1, 3];
sort($arr6);
echo "sort(): "; print_r($arr6);

rsort($arr6);
echo "rsort(): "; print_r($arr6);

$arrAssoc2 = ["b" => 2, "a" => 1, "c" => 3];
asort($arrAssoc2); 
echo "asort(): "; print_r($arrAssoc2);

ksort($arrAssoc2);
echo "ksort(): "; print_r($arrAssoc2);

arsort($arrAssoc2);
echo "arsort(): "; print_r($arrAssoc2);

krsort($arrAssoc2);
echo "krsort(): "; print_r($arrAssoc2);
?>