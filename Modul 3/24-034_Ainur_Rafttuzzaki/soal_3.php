<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.<br>";

$height["Zaki"] = "170";
$height["Zaidan"] = "172";
$height["Riel"] = "169";
$height["Rafi"] = "177";
$height["Izzul"] = "180";

$keys = array_keys($height);
echo "Nilai terakhir : " . end($keys) . "<br>";
echo "Hapus Data : $height[Izzul] <br>";
unset($height["Izzul"]);
$keys = array_keys($height);
echo "Nilai terakhir : " . end($keys) . "<br>";

$weight = array("Zaki"=>49, "Izzul"=>46, "Zaidan"=>44);
echo "Data kedua : $weight[Izzul] <br>";
?>