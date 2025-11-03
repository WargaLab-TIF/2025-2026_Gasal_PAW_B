<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.";

echo "<br><h2>Menambahkan lima data baru dalam array</h2>";
$height["Budi"] = "180";
$height["Zaka"] = "175";
$height["Ronzi"] = "168";
$height["Fajar"] = "172";
$height["Syadat"] = "169";

$lastKey = array_key_last($height);
$lastValue = $height[$lastKey];

echo "Nilai terakhir adalah " . $lastKey . " dengan tinggi " . $lastValue . " cm.";

echo "<br><h2>Hapus satu data tertentu dari array</h2>";
unset($height["Charlie"]);
$lastKey = array_key_last($height);
$lastValue = $height[$lastKey];

echo "Nilai terakhir adalah " . $lastKey . " dengan tinggi " . $lastValue . " cm.";

echo "<br><h2>Buat array baru dengan nama weight yang memiliki tiga buah data!</h2>";
$weight = [
    "Andy" => "70",
    "Barry" => "60",
    "Charlie" => "65"
];
echo "Berat badan Charlie adalah " . $weight["Barry"] . " kg.";
?>