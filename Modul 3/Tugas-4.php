<?php
$height = array(
    "Andi"=>"176",
    "Barry"=>"165",
    "Charlie"=>"170"
);

foreach($height as $x => $x_value) {
    echo "key= ". $x. ", value=" . $x_value;
    echo "<br>";
}

echo "<br>";

//soal 1
$height = array(
    "Andi"=>"176",
    "Barry"=>"165",
    "Charlie"=>"170",
    "ma'wa"=>"168",
    "tina"=>"175",
    "inara"=>"180",
    "fathar"=>"160",
    "sheza"=>"177"
);
$keys = array_keys($height);
$values = array_values($height);

echo"<b>Menambahkan data baru: </b><br>";
for($i = 0; $i < count($height); $i++) {
    echo "Key= " . $keys[$i] . ", Value= " . $values[$i] . "<br>";
}
echo "<br>";
echo "<br>";

//soal 2
$weight= array("awa"=>70,
        "nara"=>65,
        "ceza"=>68
);
$keys = array_keys($weight);
$values = array_values($weight);

echo"<b>Array baru: </b><br>";
for($i = 0; $i < count($weight); $i++) {
    echo "Key= " . $keys[$i] . ", Value= " . $values[$i]."<br>";
}

?>