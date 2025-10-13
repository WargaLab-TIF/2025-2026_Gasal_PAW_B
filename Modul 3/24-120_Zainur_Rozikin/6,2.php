<?php
$height =  ["Andy" => "176", "Barry"=>"165", "Charly"=>"170"];
$height = array_merge($height,[
    "budi" => "170",
    "rozi" => "182",
    "Dani" => "168",
    "Yanti" => "155",
    "Joko" => "165",
]);



foreach($height as $nama => $a){
    echo "$nama is $a cm tall <br>";
};

