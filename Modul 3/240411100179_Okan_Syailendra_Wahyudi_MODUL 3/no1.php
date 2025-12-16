<?php
$fruits = array("Avocado", "Blueberry", "Cherry");


array_push($fruits, "Durian", "Mango", "Orange", "Apple", "Banana");
echo "Daftar buah:<br>";
foreach ($fruits as $index => $value) {
    echo "Indeks ke-$index : $value <br>";
}
$lastIndex = count($fruits) - 1;
echo "<br>Indeks tertinggi saat ini adalah: $lastIndex<br><br>";


unset($fruits[1]);
echo "Setelah dihapus satu data:<br>";
foreach ($fruits as $index => $value) {
    echo "Indeks ke-$index : $value <br>";
}
$lastIndex = max(array_keys($fruits));
echo "<br>Indeks tertinggi sekarang adalah: $lastIndex<br><br>";


$vegies = array("Carrot", "Spinach", "Broccoli");
echo "Data sayur:<br>";
foreach ($vegies as $sayur) {
    echo "$sayur<br>";
}
?>
