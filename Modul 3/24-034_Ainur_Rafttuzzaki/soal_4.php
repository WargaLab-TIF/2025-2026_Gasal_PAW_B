<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170", "Zaki"=>"170", "Zaidan"=>"172", "Riel"=>"169", "Rafi"=>"177", "Izzul"=>"180");

foreach($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}

echo "<br>";
$weight = array("Zaki"=>49, "Izzul"=>46, "Zaidan"=>44);
foreach($weight as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
?>