<?php
$height = array("Andi" => 176, "Barry" => 165, "Charlie" => 170);
echo "Andi is " . $height['Andi'] . " cm tall.<br>";
$height["Doni"] = 180;
$height["Edi"] = 175;
$height["Figo"] = 160;
$height["Bayu"] = 168;
echo "Nilai terakhir array \$height: " . end($height);
echo "<br>";
unset($height["Barry"]);
echo "Nilai terakhir array \$height: " . end($height);
echo "<br><br>";
?>
<?php
$weight = array("Andi" => 70, "Barry" => 60, "Charlie" => 65);
echo "Barry's weight is " . $weight['Barry'] . " kg.<br>";