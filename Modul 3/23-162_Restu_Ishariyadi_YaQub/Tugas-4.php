<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");

// Menambah 5 data baru
$height["Karim"] = "180";
$height["Adi"] = "181";
$height["Frank"] = "168";
$height["Sinatra"] = "185";
$height["Wawan"] = "177";

echo "seluruh data \$height <br>";
foreach($height as $nama => $tinggi) {
    echo "key = " . $nama . ", value = " . $tinggi . "<br>";
}
echo "<br>";

echo "seluruh data \$weight <br>";
$weight = array("Andy"=>"68", "Barry"=>"60", "Charlie"=>"65");
foreach($weight as $nama => $berat) {
    echo "nama = " . $nama . ", berat = " . $berat . " kg<br>";
}
?>