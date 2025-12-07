<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

    echo "<br>";

$height = array_merge( $height,array("Yohan"=>"140","Torip"=>"145","Jihan"=>"158","Solikin"=>"147","Paimin"=>"149"));
foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

    echo "<br>";

$weight = array("Komar"=>"66","Andi"=>"60","Yohan"=>"60");
foreach ($weight as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
?>