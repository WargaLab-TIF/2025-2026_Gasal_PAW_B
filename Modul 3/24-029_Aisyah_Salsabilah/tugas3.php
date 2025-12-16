<?php
$height = array(
    "Andy" => 176,
    "Barry" => 165,
    "Charlie" => 170,
    "Dian" => 160,
    "Eva" => 172,
    "Fajar" => 180,
    "Gina" => 158,
    "Hadi" => 169
);

echo "Nilai terakhir dari array height: " . end($height) . "<br>";

unset($height["Charlie"]);

echo "Nilai terakhir setelah menghapus 'Charlie': " . end($height) . "<br><br>";

$weight = array(
    "Andy" => 60,
    "Barry" => 55,
    "Charlie" => 58
);

echo "Data kedua dari array weight: " . array_values($weight)[1];
?>