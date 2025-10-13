<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
// 1

$height["izzul"] = "160";
$height["zaidan"] = "155";
$height["aril"] = "168";
$height["zaki"] = "174";
$height["verdi"] = "162";

// 2

$keys = array_keys($height);
echo "Key terakhir: " . end($keys) . "<br>";

unset($height["verdi"]);
$keys = array_keys($height);
echo "Setelah dihapus, key terakhir: " . end($keys) . "<br>";

// 3

$weight = array("Andy"=>165, "Barry"=>170, "Charlie"=>168);
echo "Data kedua dari array weight: " . $weight["Barry"];
