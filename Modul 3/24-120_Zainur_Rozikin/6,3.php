<?php
$height =  ["Andy" => "176", "Barry"=>"165", "Charly"=>"170"];

$values = array_values($height);
$terahir = $values[count($values)-1];

echo "index terahir adalah $terahir";