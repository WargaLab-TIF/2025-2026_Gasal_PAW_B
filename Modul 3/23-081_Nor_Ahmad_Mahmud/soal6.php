<?php
//1
$fruits = ["Apple", "Banana"];
array_push($fruits, "Orange", "Grapes");
print_r($fruits);
echo "<br><br>";
//2
$array1 = ["Red", "Green"];
$array2 = ["Blue", "Yellow"];
$merged = array_merge($array1, $array2);
print_r($merged);
echo "<br><br>";
//3
$assocArray = ["a" => "Apple", "b" => "Banana"];
$values = array_values($assocArray);
print_r($values);
echo "<br><br>";
//4
$colors = ["Red", "Green", "Blue"];
$key = array_search("Green", $colors);
echo "Key for 'Green': " . $key;
echo "<br><br>";
//5
$numbers = [1, 2, 3, 4, 5];
$evenNumbers = array_filter($numbers, fn($n) => $n % 2 === 0);
print_r($evenNumbers);
echo "<br><br>";
//6.a Mengurutkan array numerik secara ascending.
$numbers = [4, 2, 8, 6];
sort($numbers);
print_r($numbers);
echo "<br><br>";
//6.b Mengurutkan array numerik secara descending.
$numbers = [4, 2, 8, 6];
rsort($numbers);
print_r($numbers);
echo "<br><br>";
//6.c Mengurutkan array asosiatif berdasarkan nilai secara ascending.
$ages = ["Peter" => 35, "Ben" => 37, "Joe" => 43];
asort($ages);
print_r($ages);
echo "<br><br>";
//6.d Mengurutkan array asosiatif berdasarkan nilai secara descending.
$ages = ["Peter" => 35, "Ben" => 37, "Joe" => 43];
arsort($ages); 
print_r($ages);
echo "<br><br>";
//6.e Mengurutkan array asosiatif berdasarkan kunci secara ascending.
$ages = ["Peter" => 35, "Ben" => 37, "Joe" => 43];
ksort($ages);
print_r($ages);
echo "<br><br>";
//6.f Mengurutkan array asosiatif berdasarkan kunci secara descending.
$ages = ["Peter" => 35, "Ben" => 37, "Joe" => 43];
krsort($ages);
print_r($ages);
echo "<br><br>";
?>


