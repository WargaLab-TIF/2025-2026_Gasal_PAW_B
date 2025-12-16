<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);
for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}

echo "<br>";
echo 'nomor 1';
echo "<br>";
echo 'tambahkan 5 data baru';
echo "<br>";
array_push($fruits, "Jambu", "Sirak", "Alpukat", "Nanas", "Staroberi");
$arrlength = count($fruits);

echo count($fruits);
echo "<br>";
for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}

echo "<br>";
echo 'tidak mengubah code lop for karena variabel $arrlength melakukan perhitungan secara otomatis dari panjang array';

echo "<br>";
echo "<br>";
echo 'nomor 2';
echo "<br>";

$vegies = array("Wortel", "Broccoli", "Kentang");
$arrlength = count($vegies);

for ($x = 0; $x < $arrlength; $x++) {
    echo $vegies[$x];
    echo "<br>";
}
echo "<br>";

echo 'disini saya membuat code baru namun bukan mengganti yg lama , stuktur logika masih sama hanya variabel dan array yg beda dan sama pakai for ';
