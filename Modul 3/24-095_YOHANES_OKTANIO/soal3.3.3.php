<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
echo "Andy is " . $height['Andy'] . " cm tall. <br>";
$height = array_merge( $height,array("Yohan"=>"140","Torip"=>"145","Jihan"=>"158","Solikin"=>"147","Paimin"=>"149"));
echo "Paimin is " . $height['Paimin'] . " cm tall.<br>";

unset($height['Charlie']);
echo "Paimin is " . $height['Paimin'] . " cm tall.<br>";

$weight = array("Komar"=>"66","Andi"=>"60","Yohan"=>"60");
echo "Andi is " . $weight['Andi'] . " weight.<br>";

?>