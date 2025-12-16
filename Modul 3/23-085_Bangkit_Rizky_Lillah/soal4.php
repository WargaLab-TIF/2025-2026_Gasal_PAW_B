<?php
#3.3.4.1
echo "<b>Soal 3.3.4.1</b> <br><br>";
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"178");
$height += [
    "Danang" => "180",
    "Edo" => "172",
    "Fifi" => "168",
    "Gondrong" => "174",
    "Hendra" => "165"
];

foreach($height as $x => $value) {
    echo "Key = " . $x . ", Value = " . $value;
    echo "cm<br>";
}

#3.3.4.2
echo "<br><b>Soal 3.3.4.2</b> <br><br>";
$weight = array("Andy"=>"78", "Barry"=>"65", "Charlie"=>"80");

foreach($weight as $x => $value) {
    echo "Key = " . $x . ", Value = " . $value;
    echo "kg<br>";
}

?>