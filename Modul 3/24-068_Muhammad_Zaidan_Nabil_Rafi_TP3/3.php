<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");

$height["Diana"] = "160";
$height["Evelyn"] = "155";
$height["Frank"] = "168";
$height["George"] = "174";
$height["Hannah"] = "162";

$keys = array_keys($height);
echo "Key terakhir: " . end($keys) . "<br>";

unset($height["Barry"]);
$keys = array_keys($height);
echo "Setelah dihapus, key terakhir: " . end($keys) . "<br>";

$weight = array("Andy"=>65, "Barry"=>70, "Charlie"=>68);
echo "Data kedua dari array weight: " . $weight["Barry"];
?>