<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.";
echo "<br>";
// Pertanyaan No 1 : Tambah 5 data baru dalam array $height
$height["Diana"] = "168";
$height["Ethan"] = "174";
$height["Fiona"] = "160";
$height["George"] = "172";
$height["Hannah"] = "169";
var_dump($height);
echo "<hr>";

// Pertanyaan No 2 : Hapus satu data
unset($height["Hannah"]);
var_dump($height);
echo "<hr>";

// Pertanyaan No 3 : Buat array baru dengan $weight dan tampilkan seluruh datanya
$weight = array("Andy"=>"70", "Barry"=>"60", "Charlie"=>"65");
echo "Data kedua: " . $weight['Barry'] . "<br>";
?>