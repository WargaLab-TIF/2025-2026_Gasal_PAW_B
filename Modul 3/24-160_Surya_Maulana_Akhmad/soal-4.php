<?php

$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
// pertanyaan 1
$height = array_merge($height, array(
    "Surya" => "177",
    "Maulana" => "174",
    "Akhmad" => "147",
    "Sayifulloh" => "137",
    "Ajib" => "173"
));

foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

echo "<br><br>";

$weight = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");

foreach ($weight as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
