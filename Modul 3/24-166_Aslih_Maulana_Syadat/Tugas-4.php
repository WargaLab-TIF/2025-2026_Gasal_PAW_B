<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

$height["Budi"] = "180";
$height["Zaka"] = "175";
$height["Ronzi"] = "168";
$height["Fajar"] = "172";
$height["Syadat"] = "169";

echo "<b>Menampilkan seluruh data dalam array:</b><br>";
foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

$weight = [
    "Andy" => "70",
    "Barry" => "60",
    "Charlie" => "65"
];

$keys = array_keys($weight);
$length = count($weight);

echo "<br><b>Menampilkan seluruh data dalam array baru:</b><br>";
for($i = 0; $i < $length; $i++) {
    $key = $keys[$i];
    $value = $weight[$key];
    
    echo "Key=" . $key . ", Value=" . $value;
    echo "<br>";
}
?>