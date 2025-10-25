<?php
$fruits = array("avocado", "blueberry", "cherry");
$arrlength = count($fruits);

for($x = 0; $x < $arrlength; $x++) {
  echo $fruits[$x];
  echo "<br>";
}

$tambahan = array("nanas", "pisang", "jeruk", "delima", "apel");

for ($i = 0; $i < count($tambahan); $i++) {
    $fruits[] = $tambahan[$i]; 
}

echo "<h3>nomor 1:</h3>";
for ($x = 0; $x < count($fruits); $x++) {
    echo "Index $x: " . $fruits[$x] . "<br>";
}
echo "<br>";
echo "Jumlah data saat ini: " . count($fruits) . "<br><br>";

$vegies = array("wortel", "kentang", "brokoli");

echo "<h3>nomor 2</h3>";
for ($i = 0; $i < count($vegies); $i++) {
    echo "Index $i: " . $vegies[$i] . "<br>";
}

?>