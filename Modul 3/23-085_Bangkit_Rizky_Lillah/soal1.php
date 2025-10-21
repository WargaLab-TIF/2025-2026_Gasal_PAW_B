<?php
#3.3.1.1
echo "<b>Soal 3.3.1.1</b> <br><br>";
$fruits = array("Avocado", "Blueberry", "Cherry");
array_push($fruits, "Durian", "Apple", "Banana", "Mango", "Orange");

var_dump($fruits);

$indeks_tertinggi = count($fruits) - 1;
echo "<br>indeks tertinggi: " . $fruits[$indeks_tertinggi];
echo "<br>Indeks tertinggi array \$fruits: " . $indeks_tertinggi;
echo "<br><br>";

#3.3.1.2
echo "<b>Soal 3.3.1.2</b> <br><br>";
unset($fruits[2]);
$fruits = array_values($fruits);

var_dump($fruits);

$indeks_tertinggi = count($fruits) - 1;
echo "<br>indeks tertinggi: " . $fruits[$indeks_tertinggi];
echo "<br>Indeks tertinggi Array \$fruits: " . $indeks_tertinggi;
echo "<br><br>";

#3.3.1.3
echo "<b>Soal 3.3.1.3</b> <br><br>";
$vegies = array("Avocado", "Blueberry", "Cherry");

echo "Isi array \$vegies:<br>";
foreach($vegies as $v) {
    echo "- " . $v . "<br>";
}

?>
