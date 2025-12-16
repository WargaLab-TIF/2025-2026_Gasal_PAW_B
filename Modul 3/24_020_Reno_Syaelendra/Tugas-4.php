<?php
// Pertanyaan No 1 : Tampilkan seluruh data dalam array $height dengan foreach
$height = array(
    "Andy"=>"176", "Barry"=>"165", "Charlie"=>"170",
    "Diana"=>"168", "Ethan"=>"174", "Fiona"=>"160", "George"=>"172", "Hannah"=>"169"
);

$keys = array_keys($height);
$values = array_values($height);
for ($i = 0; $i < count($height); $i++) {
    echo "Key=" . $keys[$i] . ", Value=" . $values[$i] . "<br>";
}
echo "<hr>";

// Pertanyaan No 2 : Buat array baru dengan $weight dan tampilkan seluruh datanya dengan for
$weight = array("Andy"=>"70", "Barry"=>"60", "Charlie"=>"65");
$keys = array_keys($weight);
$values = array_values($weight);

for ($i = 0; $i < count($weight); $i++) {
    echo "Key=" . $keys[$i] . ", Value=" . $values[$i];
    echo "<br>";
}
