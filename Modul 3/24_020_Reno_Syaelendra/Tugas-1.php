<?php
$fruits = array("Avocado", "Blueberry", "Cherry");
echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";  
// Pertanyaan No 1: Tambah 5 data baru
array_push($fruits, "Durian", "Elderberry", "Fig", "Grapes", "Honeydew"); 
echo "<br>";
var_dump($fruits);
echo "<hr>";

// Pertanyaan No 2: Hapus satu data
unset($fruits[7]);
echo "<br>";
var_dump($fruits);
echo "<hr>";

// Pertanyaan No 3: Buat array baru dengan $vegies dan tampilkan sluruh datanya
$vegies = array("Carrot", "Broccoli", "Asparagus");
foreach ($vegies as $vegie) {
    echo "<br>I like " . $vegie . ".";
}
?>