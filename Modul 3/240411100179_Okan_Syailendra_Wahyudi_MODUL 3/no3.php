<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");


$height["David"] = "180";
$height["Evan"] = "168";
$height["Frank"] = "172";
$height["Grace"] = "169";
$height["Helen"] = "164";


foreach ($height as $name => $cm) {
    echo "$name : $cm cm<br>";
}

unset($height["Barry"]);

echo "<br>Setelah dihapus Barry:<br>";
foreach ($height as $name => $cm) {
    echo "$name : $cm cm<br>";
}

$weight = array("Andy" => 70, "Barry" => 65, "Charlie" => 68);
echo "<br>Data kedua dari array weight adalah: ";
$keys = array_keys($weight);
echo $weight[$keys[1]];
?>
