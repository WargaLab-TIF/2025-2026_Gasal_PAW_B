<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
$height["irwan"] = "180";
$height["ali"] = "167";
$height["adi"] = "170";
$height["deo"] = "172";
$height["alan"] = "159";
$keys = array_keys($height);
$last_key = end($keys);
echo $height[$last_key];
echo '<br>';

array_pop($height);
$keys = array_keys($height);
$last_key = end($keys);
echo $height[$last_key];
echo '<br>';

$weight = array("Bagus" => "56", "Dany" => "65", "Putra" => "70");
print_r($weight);
?>