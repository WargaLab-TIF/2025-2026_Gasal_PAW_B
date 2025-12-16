<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
echo "Andy is " . $height['Andy'] . " cm tall.<br>";
echo "<hr>";
//1.Menambahkan lima data baru dalam array $height! Tampilkan nilai dengan indeks terakhir dari array $height!
$height["Rizki"] = "160";
$height["Budi"] = "165";
$height["Rozi"] = "166";
$height["Zakaria"] = "170";
$height["Syadat"] = "160";

$indeks_terakhir = array_key_last($height);
echo "1. Nilai dengan indeks terakhir adalah: " . $height[$indeks_terakhir]. " Namanya adalah: $indeks_terakhir";
echo "<br>";
echo "<hr>";

//2. Hapus satu data tertentu dari array $height! Tampilkan nilai dengan indeks terakhir dari array $height!
unset($height["Charlie"]);
$indeks_terakhir = array_key_last($height);
echo "2. Setelah dihapus, nilai dengan indeks terakhir adalah: " . $height[$indeks_terakhir]. " Namanya adalah: $indeks_terakhir";
echo "<br>";
echo "<hr>";

//3. Buat array baru dengan nama $weight yang memiliki tiga buah data! Tampilkan data kedua dari array $weight!
$weight = array("Budi"=>"60", "Rizki"=>"90", "Rozi"=>"55");

$key = array_keys($weight);
$key2 = $key[1];
echo "3. Data kedua dari array weight adalah: " . $weight[$key2] . " Namanya adalah: $key2";
echo "<br>";

?>