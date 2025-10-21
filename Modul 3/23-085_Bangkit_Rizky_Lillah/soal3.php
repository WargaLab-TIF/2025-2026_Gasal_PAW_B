<?php
#3.3.3.1
echo "<b>Soal 3.3.3.1</b> <br><br>";
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"178");
$height += [
    "Danang" => "180",
    "Edo" => "172",
    "Fifi" => "168",
    "Gondrong" => "174",
    "Hendra" => "165"
];
var_dump($height);

$keys = array_keys($height);
$last_key = end($keys);
echo "<br>Index terakhir: " . $height[$last_key] . " (Nama : " . $last_key . ")";


#3.3.3.2
echo "<br><br><b>Soal 3.3.3.2</b> <br><br>";
unset($height[$keys[7]]);
var_dump($height);

$keys = array_keys($height);
$last_key = end($keys);
echo "<br>Nilai terakhir setelah dihapus: " . $height[$last_key] . " (Nama : " . $last_key . ")";


#3.3.3.3
echo "<br><br><b>Soal 3.3.3.3</b> <br><br>";
$weight = array("Andy"=>"70", "Barry"=>"60", "Charlie"=>"68");
var_dump($weight);

echo "<br>Data kedua array \$weight : ";
$keys = array_keys($weight);
echo $keys[1] . " = " . $weight[$keys[1]] . " kg";

?>
