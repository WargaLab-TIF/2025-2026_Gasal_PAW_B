<?php
echo "<h3>Eksplorasi Lanjutan Terhadap Array</h3>";

$fruits1 = array("Apple", "Banana", "Cherry");
$fruits2 = array("Durian", "Mango", "Orange");

array_push($fruits1, "Papaya", "Watermelon");
echo "<b>1. Hasil array_push():</b><br>";
print_r($fruits1);
echo "<hr>";

$merged = array_merge($fruits1, $fruits2);
echo "<b>2. Hasil array_merge():</b><br>";
print_r($merged);
echo "<hr>";

$values = array_values($merged);
echo "<b>3. Hasil array_values():</b><br>";
print_r($values);
echo "<hr>";

$search = array_search("Mango", $merged);
echo "<b>4. Hasil array_search('Mango'):</b> Index = $search";
echo "<hr>";

$filtered = array_filter($merged, function($item) {
    return strlen($item) > 5;
});
echo "<b>5. Hasil array_filter() (nama > 5 huruf):</b><br>";
print_r($filtered);
echo "<hr>";

$sortAsc = $merged;
sort($sortAsc);
echo "<b>6a. sort() ascending:</b><br>";
print_r($sortAsc);
echo "<br><br>";

$sortDesc = $merged;
rsort($sortDesc);
echo "<b>6b. rsort() descending:</b><br>";
print_r($sortDesc);
echo "<br><br>";

$assoc = array("a"=>"Apple", "b"=>"Cherry", "c"=>"Banana");
asort($assoc);
echo "<b>6c. asort() pada array asosiatif (urut nilai):</b><br>";
print_r($assoc);
?>
