<?php
$height = array(
  "Andy"=>"176",
  "Barry"=>"165",
  "Charlie"=>"170",
  "Diana"=>"160",
  "Evelyn"=>"155",
  "Frank"=>"168",
  "George"=>"174",
  "Hannah"=>"162"
);

foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value . "<br>";
}

$weight = array("Andy"=>65, "Barry"=>70, "Charlie"=>68);
foreach($weight as $k => $v) {
    echo "Key=" . $k . ", Value=" . $v . "<br>";
}
