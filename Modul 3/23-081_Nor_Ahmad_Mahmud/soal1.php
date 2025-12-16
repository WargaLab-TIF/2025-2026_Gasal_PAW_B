<?php
// 1. Membuat array $fruit awal
$fruit = array("Jambu", "Pelem", "Melon");
echo "I like " . $fruit[0] . ", " . $fruit[1] . ", and " . $fruit[2] . ".<br>";
array_push($fruit, "Durian", "Salak", "Apel", "Anggur", "Gedang");
$highestIndex = count($fruit) - 1;
echo "<br>Nilai dengan indeks tertinggi ($highestIndex): " . $fruit[$highestIndex] . "<br>";

array_splice($fruit, 2, 1);


$highestIndex = count($fruit) - 1;
echo "<br>Nilai dengan indeks tertinggi ($highestIndex): " . $fruit[$highestIndex] . "<br>";

// 3. Membuat array baru $vegies
$vegies = array("Kangkung", "Bayem", "Sawi");

echo "<br>Seluruh data \$vegies:<br>";
foreach ($vegies as $value) {
    echo $value . ", ";
}
?>
