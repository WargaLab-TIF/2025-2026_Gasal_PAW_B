<?php
$fruit = array("Avocado", "Blueberry", "cherry");
$newfruit = array("Durian", "gedang", "Kelapa", "Jambu","Manggis");
for ($i = 0; $i < count($newfruit); $i++) {
    $fruit[]= $newfruit[$i];
}
$aarlength = count($fruit);

echo"jumlah elemen array saat ini : " . $aarlength. "<br>";

for($x = 0; $x < $aarlength; $x++) {
    echo $fruit[$x];
    echo "<br>";
}
echo "<br>";
?>
<?php
echo "<b>Sayuran : </b><br>";
$vegies = array("Kangkung", "Bayem", "Sawi");

$arrlength = count($vegies);

for($x = 0; $x < $arrlength; $x++) {
  echo $vegies[$x];
  echo "<br>";
}
?>
