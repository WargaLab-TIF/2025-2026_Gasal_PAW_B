<?php
// 1

$height = array(
  "Andy"=>"176",
  "Barry"=>"165",
  "Charlie"=>"170",
  "izzul"=>"160",
  "verdi"=>"155",
  "zaki"=>"168",
  "rafi"=>"174",
  "zaidan"=>"162"
);

foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value . "<br>";
}
// 2

$weight = array("Andy"=>65, "Barry"=>70, "Charlie"=>68);
foreach($weight as $k => $v) {
    echo "Key=" . $k . ", Value=" . $v . "<br>";
}

