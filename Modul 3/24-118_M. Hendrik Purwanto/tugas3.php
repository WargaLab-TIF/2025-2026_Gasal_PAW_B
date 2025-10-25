<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

$height["David"] = "180";
$height["Edward"] = "172";
$height["Frank"] = "168";
$height["George"] = "177";
$height["Henry"] = "169";

$keys = array_keys($height);
$lastKey = end($keys);
echo "Nilai terakhir dari array \$height: " . $height[$lastKey] . " cm<br><br>";

unset($height["Barry"]);
$keys = array_keys($height);
$lastKey = end($keys);
echo "Nilai terakhir setelah penghapusan: " . $height[$lastKey] . " cm<br><br>";

$weight = array("Andy"=>"70", "Barry"=>"65", "Charlie"=>"68");
$keysWeight = array_keys($weight);
echo "Data kedua dari array \$weight: " . $weight[$keysWeight[1]] . " kg";
?>
