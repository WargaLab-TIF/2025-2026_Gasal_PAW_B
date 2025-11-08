<?php
$height = [
    "Andy" => "176",
    "Barry" => "165",
    "Charly" => "170"
];
$height = array_merge($height,[
    "Tegar" => "170",
    "Firman" => "182",
    "Dani" => "168",
    "Yanti" => "155",
    "Joko" => "165",
]);


foreach($height as $x => $x_value){
    echo "key = " .$x. ", value ". $x_value;
    echo "<br>";
}