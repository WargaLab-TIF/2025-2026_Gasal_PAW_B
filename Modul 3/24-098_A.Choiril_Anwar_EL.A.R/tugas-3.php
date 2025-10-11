<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall." . "<br>";

// tambah 5 data
$height += array(
    "Riel" => "180",
    "EL" => "175",
    "Ruel" => "160",
    "Sherin" => "178",
    "Jeki" => "172"
);
// nampilin index tertinggi
$lastidx=end($height);
echo $lastidx . "<br>";

// hapus 1 data
unset($height['Jeki']);
// nampilin index tertinggi yg uda di hapus
$lastidx=end($height);
echo $lastidx;

//buat array baru isinya 3 data dan nampilin semua isinya
$weight = array("Riel"=>"70", "Ruel"=>"60", "EL"=>"65");
// nampilin data ke 2
echo "<br>" . $weight['Ruel'];
?>