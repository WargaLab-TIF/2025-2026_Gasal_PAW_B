<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

// Menambahkan 5 data baru ke dalam array $fruits menggunakan FOR
for ($i = 0; $i < 5; $i++) {
	$fruits[] = "Buah ke-" . ($i + 4);
}
$arrlength = count($fruits);

for($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}

// Membuat array baru bernama $vegies
$vegies = array("Carrot", "Broccoli", "Spinach");

echo "<br>daftar sayuran:<br>";
// Menampilkan seluruh data array $vegies menggunakan perulangan FOR
for ($y = 0; $y < count($vegies); $y++) {
	echo $vegies[$y];
	echo "<br>";
}
echo "<br>Panjang array \$fruits saat ini: " . count($fruits);
?>