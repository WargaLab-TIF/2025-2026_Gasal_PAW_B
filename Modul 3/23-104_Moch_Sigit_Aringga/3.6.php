<?php
echo "nomor 1";
echo "<br>";
$fruits = array("Apple", "Banana", "Cherry");
array_push($fruits, "Durian", "Mango"); // Menambahkan elemen di akhir array
print_r($fruits);

echo "<br>";
echo "<br>";
echo "nomor 2";
echo "<br>";
$vegies = array("Carrot", "Broccoli");
$all_foods = array_merge($fruits, $vegies); 
print_r($all_foods);

echo "<br>";
echo "<br>";
echo "nomor 3";
echo "<br>";
$student_age = array("Andi" => 21, "Budi" => 22, "Citra" => 23);
$values = array_values($student_age); 
print_r($values);

echo "nomor 4";
echo "<br>";
$search_result = array_search("Mango", $fruits); 
if ($search_result !== false) {
    echo "Elemen 'Mango' ditemukan pada indeks: $search_result";
} else {
    echo "Elemen tidak ditemukan.";
}

echo "<br>";
echo "<br>";
echo "nomor 5  ";
echo "<br>";
$numbers = array(10, 25, 30, 45, 50, 65);
$filtered = array_filter($numbers, function($num) {
    return $num > 30; 
});
print_r($filtered);


echo "<br>";

echo "nomor 6 ";
echo "<br>";
$sort_example = array("Orange", "Apple", "Banana");
echo '<br>';

sort($sort_example);
echo 'short a-z';
echo '<br>';
echo "sort(): "; print_r($sort_example);
echo '<br>';
echo '<br>';

rsort($sort_example);
echo 'short z-a';
echo '<br>';
echo "<br>rsort(): "; print_r($sort_example);
echo '<br>';
$assoc_array = array("b"=>"Lemon", "a"=>"Orange", "c"=>"Banana");

echo '<br>';
asort($assoc_array);
echo'short a-z tetap key';
echo '<br>';
echo "<br>asort(): "; print_r($assoc_array);
echo "<br>";

ksort($assoc_array);
echo 'short a-z key';
echo '<br>';
echo "<br>ksort(): "; print_r($assoc_array);
echo "<br>";

echo "<br>";
arsort($assoc_array);
echo 'short z-a tetap key';
echo '<br>';
echo "<br>arsort(): "; print_r($assoc_array);
echo "<br>";

krsort($assoc_array);
echo 'short z-a key';
echo "<br>krsort(): "; print_r($assoc_array);
?>
