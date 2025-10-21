<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".<br><br>";

echo "5 Data Baru: <br>";
$fruits = array("Avocado", "Blueberry", "Cherry");
array_push($fruits, "Durian", "Elderberry", "Fig", "Grape", "Honeydew");
$highestIndex = count($fruits) - 1;
echo "Nilai indeks tertinggi: {$fruits[$highestIndex]}<br>";
echo "Indeks tertinggi: $highestIndex<br><br>";

echo "Menghapus Satu Data: <br>";
array_splice($fruits, 3, 1);
$highestIndex = count($fruits) - 1;
echo "Nilai indeks tertinggi: {$fruits[$highestIndex]}<br>";
echo "Indeks tertinggi: $highestIndex<br><br>";

echo "Array Baru: <br>";
$vegies = array("Carrot", "Broccoli", "Spinach");
foreach($vegies as $index => $value) {
    echo "Index [$index] = $value<br>";
}
?>