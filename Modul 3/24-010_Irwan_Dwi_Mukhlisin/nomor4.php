<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
$height["irwan"] = "180";
$height["ali"] = "167";
$height["adi"] = "170";
$height["deo"] = "172";
$height["alan"] = "159";
foreach ($height as $x => $value) {
    echo "Key=" . $x . ", Value=" . $value . '<br>';
}
echo '<br>';

$weight = array("Bagus" => "56", "Dany" => "65", "Putra" => "70");
foreach ($weight as $x => $value) {
    echo "Key=" . $x . ", Value=" . $value . '<br>';
}
?>