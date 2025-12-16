<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

foreach($height as $x => $x_value){
    echo "Key = " . $x . ", Value = " . $x_value;
    echo "<br>";
}

echo "<br>Data Setelah menambah 5 Data baru : <br>";

$height["Rafi"] = "162";
$height["Qiaru"] = "163";
$height["Vera"] = "164";
$height["Biru"] = "165";
$height["Blu"] = "166";

foreach($height as $x => $x_value){
    echo "Key = " . $x . ", Value = " . $x_value;
    echo "<br>";
}

$weight = array(
    "Metagross" => "942,9 kg",
    "Steelix" => "40 kg",
    "Rayquaza" => "392 kg"
);

echo "<br>Data weight di tampilkan menggunakan perulangan for : <br>";

$weight_length = count($weight);
for($i = 0 ; $i < $weight_length ; $i++){
    echo "Key = " . array_keys($weight)[$i] , ", Value = " . array_values($weight)[$i];
    echo "<br>";
}
?>