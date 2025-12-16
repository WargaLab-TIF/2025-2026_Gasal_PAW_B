<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
echo "Andy is " . $height['Andy'] . " cm tall.";

echo "<br>";
echo "<br>";
echo 'nomor1 menambah 5 data baru';
echo "<br>";
$height["David"] = "180";
$height["Edward"] = "172";
$height["Frank"] = "168";
$height["George"] = "175";
$height["Henry"] = "169";

echo "Nilai indeks terakhir adalah: " . end($height) . " cm";

echo "<br>";
echo "<br>";
echo 'nomor 2 hapus satu data tertentu';
echo "<br>";
unset($height["Charlie"]);
echo "Setelah dihapus, nilai indeks terakhir adalah: " . end($height) . " cm";
echo "<br>";
echo "<br>";

echo 'nomor 3 membuat array baru';
echo "<br>";
$weight = array(
    "Andy" => "65",
    "Barry" => "59",
    "Charlie" => "62"
);

$values = array_values($weight);
echo "Data kedua dari array \$weight adalah: " . $values[1] . " kg";

?>