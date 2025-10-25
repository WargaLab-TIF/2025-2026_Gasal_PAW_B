<?php
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170"
);

echo "Andy is ".$height['Andy']. "cm tall";
echo "<p>";

//soal 1
$height["Mawa"] = "168";
$height["Tina"] = "175";
$height["Inara"] = "180";
$height["Fathar"] = "160";
$height["Sheza"] = "177";

echo "<b>Tambahkan lima data baru:</b><br>";

foreach ($height as $name => $cm) {
    echo "$name = $cm cm<br>";
}

echo "<b>Nilai indeks terakhir:</b> " . end($height) . " cm";
echo "<p>";

//soal 2
$removed = array_pop($height);

echo "<b>Hapus satu data terakhir:</b><br>";
echo "Data yang dihapus: " . $removed . " cm<br>";
echo "Nilai indeks terakhir sekarang: " . end($height) . " cm";
echo "<p>";


// Soal 3
$weight = array(
    "Awa" => 70,
    "Nara" => 65,
    "Ceza" => 68
);

echo "<b>Array baru: </b><br>";

foreach ($weight as $name => $kg) {
    echo "$name = $kg kg<br>";
}

$values = array_values($weight);

echo "<b>Data kedua dari array: </b> " . $values[1] . " kg";
?>
