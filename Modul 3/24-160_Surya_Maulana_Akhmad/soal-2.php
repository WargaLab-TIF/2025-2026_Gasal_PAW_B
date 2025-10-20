<?php

$fruits = array("Avocado", "Blueberry", "Cherry");
$arrlength = count($fruits);
for ($x = 0; $x < $arrlength; $x++) {
    echo $fruits[$x];
    echo "<br>";
}

// pertanyaan 1
$new_fruits = array("Apple", "Banana", "Orange", "Mango", "Guava");

for ($i=0; $i < count($new_fruits); $i++) { 
    $fruits[] = $new_fruits[$i];
}

// Hitung panjang array setelah penambahan
$arrlength = count($fruits);
echo "Panjang data setelah add data baru :" . $arrlength;


echo "<br><br>";

// pertanyaan 2
$vegies = ["Brokoli", "Wortel", "Kubis"];

// menampilkan seluruh data menggunakan for
for ($i=0; $i < 3 ; $i++) { 
    echo $vegies[$i] . "<br>";
}
