<?php
echo "<h3>Soal 1</h3>";
echo "<br>";
$fruits = array("Avocado", "Blueberry", "Cherry");
$fruits2 = ["Durian", "Manggo", "Dragonfruit", "Banana", "Jackfruit"];
$arrlength = count($fruits2);

for ($x = 0; $x < $arrlength; $x++) {
    echo "Menambahkan: " . $fruits2[$x] . "<br>";
    array_push($fruits, $fruits2[$x]);
}
echo "Jumlah data sekarang: " . count($fruits);

echo "<h3>Soal 2</h3>";
echo "<br>";
$vegies = array("Broccoli", "Carrot", "Water spinach");
echo "<b>Isi data dari vegies: <br></b>";
for ($i = 0; $i < count($vegies); $i++) {
    echo $vegies[$i] . "<br>";
}
?>