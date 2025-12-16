<?php
$height = array(
    "Andy" => 176,
    "Barry" => 165,
    "Charlie" => 170,
    "Dian" => 160,
    "Eva" => 172,
    "Fajar" => 180,
    "Gina" => 158,
    "Hadi" => 169
);

echo "<h3>Data Tinggi Badan</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nama</th><th>Tinggi (cm)</th></tr>";

foreach ($height as $name => $value) {
    echo "<tr><td>$name</td><td>$value</td></tr>";
}
echo "</table><br>";

$weight = array(
    "Andy" => 60,
    "Barry" => 55,
    "Charlie" => 58
);

echo "<h3>Data Berat Badan</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nama</th><th>Berat (kg)</th></tr>";

foreach ($weight as $name => $value) {
    echo "<tr><td>$name</td><td>$value</td></tr>";
}
echo "</table>";
?>