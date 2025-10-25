<?php
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);
$height["David"] = "180";
$height["Edward"] = "172";
$height["Frank"] = "168";
$height["George"] = "175";
$height["Harry"] = "182";

echo "<h3>Soal 1</h3>";
echo "<br>";
foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value . "<br>";
}

echo "<br>";

echo "<h3>Soal 2</h3>";
echo "<br>";
$weight = array(
    "Andy" => "70", 
    "Barry" => "65", 
    "Charlie" => "68"
);

$weightKeys = array_keys($weight);
for ($i = 0; $i < count($weight); $i++) {
    $key = $weightKeys[$i];
    echo "Key=" . $key . ", Value=" . $weight[$key] . "<br>";
}
?>