<?php
$fruits = array("avocado", "blueberry", "cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . ", and " . $fruits[2] . ".";

echo "<h3>Nomor 1</h3>";
$fruits[] = "nanas";
$fruits[] = "pisang";
$fruits[] = "jeruk";
$fruits[] = "delima";
$fruits[] = "apel";

echo "Index 0: " . $fruits[0] . "<br>";
echo "Index 1: " . $fruits[1] . "<br>";
echo "Index 2: " . $fruits[2] . "<br>";
echo "Index 3: " . $fruits[3] . "<br>";
echo "Index 4: " . $fruits[4] . "<br>";
echo "Index 5: " . $fruits[5] . "<br>";
echo "Index 6: " . $fruits[6] . "<br>";
echo "Index 7: " . $fruits[7] . "<br>";

$idx_tertinggi = count($fruits) - 1;
echo "<br>Nilai dengan indeks tertinggi: " . $fruits[$idx_tertinggi];
echo "<br>Indeks tertinggi dari array: " . $idx_tertinggi;

echo "<h3>Nomor 2</h3>";

$hapus = "apel";
unset($fruits[7]);

$fruits = array_values($fruits);

echo "Index 0: " . $fruits[0] . "<br>";
echo "Index 1: " . $fruits[1] . "<br>";
echo "Index 2: " . $fruits[2] . "<br>";
echo "Index 3: " . $fruits[3] . "<br>";
echo "Index 4: " . $fruits[4] . "<br>";
echo "Index 5: " . $fruits[5] . "<br>";
echo "Index 6: " . $fruits[6] . "<br>";

$idx_tertinggi_baru = count($fruits) - 1;
echo "<br>Nilai dengan indeks tertinggi: " . $fruits[$idx_tertinggi_baru];
echo "<br>Indeks tertinggi dari array: " . $idx_tertinggi_baru;

echo "<h3>Nomor 3</h3>";

$vegies = array("wortel", "kentang", "brokoli");

echo "Index 0: " . $vegies[0] . "<br>";
echo "Index 1: " . $vegies[1] . "<br>";
echo "Index 2: " . $vegies[2] . "<br>";

?>