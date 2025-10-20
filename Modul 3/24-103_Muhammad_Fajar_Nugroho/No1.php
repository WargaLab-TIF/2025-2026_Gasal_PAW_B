<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";

array_push($fruits, "Durian", "Manggo", "Dragonfruit", "Banana", "Jackfruit");

echo "<br>";
echo "<h3>Nomor 1</h3>";

echo "Nilai dengan indeks tertinggi adalah: " . $fruits[count($fruits) - 1];

echo "<br>";
echo "Indeks tertinggi adalah " . count($fruits) - 1;

echo "<br>";
echo "<h3>Nomor 2</h3>";
unset($fruits[5]);
echo "Nilai dengan indeks tertinggi adalah: " . $fruits[count($fruits) - 1];
echo "<br>";
echo "Indeks tertinggi adalah " . count($fruits) - 1;

echo "<br>";
echo "<h3>Nomor 3</h3>";
$vegies = array("Broccoli", "Carrot", "Water spinach");
echo "<b>Isi data dari vegies: <br></b>";
foreach($vegies as $values) {
    echo $values . "<br>";
}
?>