<?php
echo "<h3>Soal 1</h3>";
echo "<br>";
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);
echo "Andy is " . $height['Andy'] . " cm tall.";

$height["David"] = "180";
$height["Edward"] = "172";
$height["Frank"] = "168";
$height["George"] = "175";
$height["Harry"] = "182";

echo "<br>";
$keys = array_keys($height);
$lastIndex = count($keys) - 1;
$lastKey = $keys[$lastIndex];
echo "Nilai dengan indeks terakhir: " . $lastKey . " " . $height[$lastKey] . " cm";

echo "<br><br>";
echo "<h3>Soal 2</h3>";
unset($height["Barry"]);

$keys = array_keys($height);
$lastIndex = count($keys) - 1;
$lastKey = $keys[$lastIndex];
echo "<br>Nilai dengan indeks terakhir: " . $lastKey . " " . $height[$lastKey] . " cm";

echo "<br><br>";
echo "<h3>Soal 3</h3>";

$weight = array(
    "Andy" => "70",
    "Barry" => "65",
    "Charlie" => "68"
);

$weightKeys = array_keys($weight);
$kedua = $weightKeys[1];
echo "<br>Data kedua dari array weight: " . $kedua . " " . $weight[$kedua] . " kg";
?>