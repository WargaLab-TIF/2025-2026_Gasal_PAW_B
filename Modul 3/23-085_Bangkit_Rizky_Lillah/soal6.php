<?php
echo "<b>Soal 3.3.6.6 Sorting</b><br>";
$ages = ["Andy" => 25, "Barry" => 20, "Charlie" => 23];

echo "Urut berdasarkan nilai tinggi ke rendah (arsort):<br>";
arsort($ages);
echo "<pre>" . print_r($ages, true) . "</pre>";

echo "<br>Urut berdasarkan nilai rendah ke tinggi (asort):<br>";
asort($ages);
echo "<pre>" . print_r($ages, true) . "</pre>";

echo "<br>Urut berdasarkan key tinggi ke rendah (krsort):<br>";
krsort($ages);
echo "<pre>" . print_r($ages, true) . "</pre>";

echo "<br>Urut berdasarkan key rendah ke tinggi (ksort):<br>";
ksort($ages);
echo "<pre>" . print_r($ages, true) . "</pre>";

?>