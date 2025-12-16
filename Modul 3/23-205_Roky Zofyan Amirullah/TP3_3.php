<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.<br><br>";

echo "Menambahkan 5 Data Baru: <br>";
$height["David"] = "180";
$height["Eric"] = "175";
$height["Frank"] = "168";
$height["George"] = "172";
$height["Henry"] = "178";

$lastKey = array_key_last($height);
echo "Indeks terakhir: $lastKey = {$height[$lastKey]} cm<br><br>";

echo "Menghapus Satu Data: <br>";
unset($height["David"]);
$lastKey = array_key_last($height);
echo "Indeks terakhir: $lastKey = {$height[$lastKey]} cm<br><br>";

echo "Array Baru: <br>";
$weight = array("Andy"=>"70", "Barry"=>"65", "Charlie"=>"68");
$keys = array_keys($weight);
echo "Data kedua: {$keys[1]} = {$weight[$keys[1]]} kg<br>";
?>