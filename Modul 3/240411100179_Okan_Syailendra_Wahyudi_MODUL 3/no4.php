<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");

$height["David"] = "180";
$height["Evan"] = "168";
$height["Frank"] = "172";
$height["Grace"] = "169";
$height["Helen"] = "164";

foreach ($height as $nama => $nilai) {
    echo "Nama: $nama, Tinggi: $nilai cm<br>";
}

$weight = array("Andy" => 70, "Barry" => 65, "Charlie" => 68);

echo "<br>Data berat badan:<br>";
foreach ($weight as $nama => $berat) {
    echo "Nama: $nama, Berat: $berat kg<br>";
}
?>
