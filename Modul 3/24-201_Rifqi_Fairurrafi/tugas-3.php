<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.";

$height["Rafi"] = "162";
$height["Qiaru"] = "163";
$height["Vera"] = "164";
$height["Biru"] = "165";
$height["Blu"] = "166";

echo "<br>Nilai Index terakhir setelah menambah 5 data baru : " . end($height);

unset($height["Blu"]);

echo "<br>Nilai Index terakhir setelah menghapus 1 data tertentu (saya menghapus key 'Blu') : " . end($height) . "<br>";

$weight = array(
    "Metagross" => "942,9 kg",
    "Steelix" => "40 kg",
    "Rayquaza" => "392 kg"
);

var_dump($weight);

echo "<br>Data kedua pada weight : " . array_values($weight)[1];
?>