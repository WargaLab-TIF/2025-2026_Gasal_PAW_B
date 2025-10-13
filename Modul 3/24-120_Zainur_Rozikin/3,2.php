<?php
$height =  ["Andy" => "176", "Barry"=>"165", "Charly"=>"170"];
$height = array_merge($height,[
    "Tegar" => "170",
    "Firman" => "182",
    "Dani" => "168",
    "Yanti" => "155",
    "Joko" => "165",
]);

unset($height["Yanti"]);

foreach($height as $nama => $a){
    echo "$nama is $a cm tall <br>";
};

$values = array_values($height);
$terahir = $values[count($values)-1];

echo "index terahir adalah $terahir";