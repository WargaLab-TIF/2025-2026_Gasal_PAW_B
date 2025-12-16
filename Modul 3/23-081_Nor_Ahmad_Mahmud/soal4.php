<?php
$height = array("Andi" => 176, "Budi" => 165, "Citra" => 170);
$height["Doni"] = 180;
$height["Edi"] = 175;
$height["Figo"] = 160;
$height["Bayu"] = 168;
foreach ($height as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
}
echo "<br>";
?>
<?php
$weight = array("Andi" => 70, "Budi" => 60, "Citra" => 65);
$keys = array_keys($weight);
$count = count($weight);
for ($i = 0; $i < $count; $i++) {
    $current_key = $keys[$i]; 
    $current_value = $weight[$current_key]; 

    echo "Nama: " . $current_key . ", Berat: " . $current_value . " kg";
    echo "<br>";
}
?>