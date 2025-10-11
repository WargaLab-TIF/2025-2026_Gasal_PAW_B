<?php
$height = array("andy"=>"176", "barry"=>"165", "charlie"=>"170");
echo "Andy is " . $height['andy'] . " cm tall.<br>";

// nomor 1
$height["julian"] = "180";
$height["eric"] = "172";
$height["thomas"] = "168";
$height["alex"] = "175";
$height["harry"] = "178";

echo "<h3>Nomor 1:</h3>";
var_dump($height);
echo "<br><br>";
echo "Indeks terakhir memiliki nilai: " . end($height) . " cm<br><br>";

// nomor 2
unset($height["harry"]);

echo "<h3>Nomor 2:</h3>";
var_dump($height); 
echo "<br><br>";
echo "nilai indeks terakhir: " . end($height) . " cm<br><br>";

// nomor 3
$weight = array("andy" => "65", "barry" => "70", "charlie" => "60");

echo "<h3>Nomor 3:</h3>";
var_dump($weight); 
echo "<br>";

$values = array_values($weight);

echo"<br>";
echo "Data kedua dari array weight adalah: " . $values[1] . " kg";

?>
